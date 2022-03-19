<?php

namespace App\Services\Plan;

use App\Constants\NetworkConstants;
use App\Constants\StatusConstants;
use App\Constants\TransactionActivityConstants;
use App\Constants\TransactionConstants;
use App\Models\PlanBenefit;
use App\Models\ReferralBonus;
use App\Models\ReferralLevel;
use App\Services\Finance\UserTransactionService;
use App\Services\Finance\Wallet\WalletService;
use App\Services\Notifications\Network\NetworkNotificationService;
use App\Services\System\TransactionService as SystemTransactionService;
use Exception;
use Illuminate\Support\Facades\DB;

class ReferralSubscriptionService
{

    public static function shareProfits($user_id, $currency_id,  $amount)
    {
        DB::beginTransaction();
        try {

            $subscription = SubscriptionService::currentSubscription($user_id);
            if (empty($subscription)) {
                DB::rollBack();
                return;
            }

            $bonuses = collect();
            $missed_bonus_users = collect();
            $amount_shared = 0;
            $referralLevels = ReferralLevel::whereHas("user")
            ->with("user")
                ->where("new_user_id", $user_id)
                ->orderby("level", "desc")
                ->get();

            $batch_no = UserTransactionService::generateBatchNo();

            foreach ($referralLevels as $referralLevel) {
                $referrer_user_id = $referralLevel->user_id;

                $referrerSubscription = SubscriptionService::currentSubscription($referrer_user_id);

                if (empty($referrerSubscription)) {
                    $missed_bonus_users->push($referralLevel);
                    continue;
                }

                $level = $referralLevel->level;
                $plan_id = $subscription->plan_id;

                $benefit = PlanBenefit::where("plan_id", $plan_id)
                    ->where("key", NetworkConstants::KEY_REFERRAL_PERCENTAGE)
                    ->where("level", $level)
                    ->where("status", StatusConstants::ACTIVE)
                    ->first();

                if (empty($benefit)) {
                    continue;
                }

                $percentage = $benefit->value;
                $credit_amount = $amount * ($percentage / 100);

                $wallet = WalletService::getByCurrencyId($referrer_user_id, $currency_id);
                WalletService::credit($wallet, $credit_amount);
                $transaction = UserTransactionService::create([
                    "user_id" => $wallet->user_id,
                    "currency_id" => $wallet->currency_id,
                    "amount" => $credit_amount,
                    "fees" => 0,
                    "description" => "Referral earnings from Level $level subscription!",
                    "activity" => TransactionActivityConstants::SUBSCRIBE_TO_NETWORK_PLAN,
                    "batch_no" => $batch_no,
                    "type" => TransactionConstants::CREDIT,
                    "status" => StatusConstants::COMPLETED
                ]);

                $bonus = ReferralBonus::create([
                    "plan_id" => $plan_id,
                    "new_user_id" => $referralLevel->new_user_id,
                    "referrer_id" => $referralLevel->referrer_id,
                    "user_id" => $referralLevel->user_id,
                    "currency_id" => $transaction->currency_id,
                    "amount" => $transaction->amount,
                    "level" => $level,
                    "percentage_commission" => $percentage,
                ]);

                $amount_shared += $credit_amount;
                $bonuses->push($bonus);
            }

            $amount_left = $amount - $amount_shared;

            if ($amount_left != 0) {
                SystemTransactionService::recordSubscriptionRevenue($currency_id, $amount_left);
            }
            
            DB::commit();

            foreach ($bonuses as $bonus) {
                NetworkNotificationService::subscriptionBonus($bonus);
            }

            $plan_name = $subscription->plan->name;
            foreach ($missed_bonus_users as $referralLevel) {
                NetworkNotificationService::missedSubscriptionBonus($referralLevel->user , $plan_name);
            }
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
