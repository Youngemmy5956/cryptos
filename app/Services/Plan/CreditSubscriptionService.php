<?php

namespace App\Services\Plan;

use App\Constants\StatusConstants;
use App\Constants\TransactionActivityConstants;
use App\Constants\TransactionConstants;
use App\Exceptions\Plan\SubscriptionException;
use App\Models\Subscription;
use App\Services\Finance\UserTransactionService;
use App\Services\Finance\Wallet\WalletService;
use App\Services\System\ExceptionService;
use Exception;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class CreditSubscriptionService
{


    public static function check($user_id)
    {
        return Subscription::where("user_id", $user_id)
            ->whereNull("paid_on")
            ->first();
    }

    public static function subscribeAndPayLater($user_id, $plan_id)
    {
        DB::beginTransaction();
        try {
            $plan = PlanService::getById($plan_id);
            SubscriptionService::subscribeToPlan($user_id, $plan->id , null);
            UserSubscriptionService::signupBonus($user_id);
            DB::commit();
        } catch (Exception $e) {
            ExceptionService::logAndBroadcast($e);
            DB::rollback();
            throw $e;
        }
    }


    public static function clearDebt($subscription_id)
    {
        DB::beginTransaction();
        try {
            $subscription = SubscriptionService::getById($subscription_id);

            if(!empty($subscription->paid_on)){
                throw new SubscriptionException("This subscription has already been paid for on $subscription->paid_on");
            }
            $plan = PlanService::getById($subscription->plan_id);
            $user_id = $subscription->user_id;

            $amount = $subscription->price;
            $currency_id = $plan->currency_id;
            $wallet = WalletService::getByCurrencyId($user_id, $currency_id);
            WalletService::debit($wallet, $amount);
            UserTransactionService::create([
                "user_id" => $wallet->user_id,
                "currency_id" => $wallet->currency_id,
                "amount" => $amount,
                "fees" => 0,
                "description" => "Paid for credit subscription to $plan->name plan.",
                "activity" => TransactionActivityConstants::SUBSCRIBE_TO_NETWORK_PLAN,
                "batch_no" => null,
                "type" => TransactionConstants::DEBIT,
                "status" => StatusConstants::COMPLETED
            ]);

            $subscription->update([
                "paid_on" => now()
            ]);

            ReferralSubscriptionService::shareProfits($user_id, $currency_id, $amount);
            DB::commit();
        } catch (Exception $e) {
            ExceptionService::logAndBroadcast($e);
            DB::rollback();
            throw $e;
        }
    }

}
