<?php

namespace App\Services\Plan;

use App\Constants\NetworkConstants;
use App\Constants\StatusConstants;
use App\Constants\TransactionActivityConstants;
use App\Constants\TransactionConstants;
use App\Models\PlanBenefit;
use App\Services\Finance\UserTransactionService;
use App\Services\Finance\Wallet\WalletService;
use App\Services\System\TransactionService;
use Exception;
use Illuminate\Support\Facades\DB;

class UserSubscriptionService
{

    public static function signupBonus($user_id)
    {
        DB::beginTransaction();
        try {

            $subscription = SubscriptionService::currentSubscription($user_id);

            if (empty($subscription)) {
                DB::rollBack();
                return;
            }
            $plan = $subscription->plan;

            $benefit = PlanBenefit::where("plan_id", $plan->id)
                ->where("key", NetworkConstants::KEY_SUBSCRIPTION_BONUS)
                ->whereNotNull("currency_id")
                ->whereNotNull("value")

                ->where("status", StatusConstants::ACTIVE)
                ->first();

            if (empty($benefit)) {
                DB::rollBack();
                return;
            }

            $credit_amount = $benefit->value;

            $wallet = WalletService::getByCurrencyId($user_id, $benefit->currency_id);
            WalletService::credit($wallet, $credit_amount);
            $transaction = UserTransactionService::create([
                "user_id" => $wallet->user_id,
                "currency_id" => $wallet->currency_id,
                "amount" => $credit_amount,
                "fees" => 0,
                "description" => "Instant subscription bonus for $plan->name plan.",
                "activity" => TransactionActivityConstants::SUBSCRIBE_TO_NETWORK_PLAN,
                "batch_no" => null,
                "type" => TransactionConstants::CREDIT,
                "status" => StatusConstants::COMPLETED
            ]);

            TransactionService::recordPlanSubscriptionBonus($transaction->currency_id, $credit_amount);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public static function activityBonus($user_id)
    {
        DB::beginTransaction();
        try {

            $subscription = SubscriptionService::currentSubscription($user_id);

            if (empty($subscription)) {
                return;
            }
            $plan = $subscription->plan;

            $benefit = PlanBenefit::where("plan_id", $plan->id)
                ->whereNotNull("currency_id")
                ->whereNotNull("value")
                ->where("key", NetworkConstants::KEY_DAILY_COINS)
                ->where("status", StatusConstants::ACTIVE)
                ->first();

            if (empty($benefit)) {
                return;
            }

            $credit_amount = $benefit->value;

            $wallet = WalletService::getByCurrencyId($user_id, $benefit->currency_id);
            WalletService::credit($wallet, $credit_amount);
            $transaction = UserTransactionService::create([
                "user_id" => $wallet->user_id,
                "currency_id" => $wallet->currency_id,
                "amount" => $credit_amount,
                "fees" => 0,
                "description" => "Daily activity subscription bonus for $plan->name plan.",
                "activity" => TransactionActivityConstants::SUBSCRIPTION_DAILY_ACTIVITY,
                "batch_no" => null,
                "type" => TransactionConstants::CREDIT,
                "status" => StatusConstants::COMPLETED
            ]);

            TransactionService::recordPlanSubscriptionActivityBonus($transaction->currency_id, $credit_amount);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
