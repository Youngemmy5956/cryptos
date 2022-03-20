<?php

namespace App\Services\Plan;

use App\Constants\StatusConstants;
use App\Constants\TransactionActivityConstants;
use App\Constants\TransactionConstants;
use App\Exceptions\SubscriptionException;
use App\Models\Plan;
use App\Models\Subscription;
use App\Models\User;
use App\Services\Wallet\UserTransactionService;
use App\Services\System\ExceptionService;
use App\Services\Wallet\WalletService;
use Exception;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class SubscriptionService
{
    public static function getById($id): Subscription
    {
        $subscription = Subscription::find($id);
        if (empty($subscription)) {
            throw new SubscriptionException("Subscription not found");
        }
        return $subscription;
    }


    public static function syncPermissions(User $user, Plan $plan)
    {
        $permissions = Permission::whereIn("name", $plan->getFeatures())->get();
        return $user->syncPermissions($permissions);
    }

    public static function removePermissions(User $user)
    {
        return $user->removePermissions();
    }

    public static function subscribeToPlan(
        $user_id,
        $plan_id,
        $paid_on = null
    ) {

        if (!empty(CreditSubscriptionService::check($user_id))) {
            throw new SubscriptionException("You have to clear your pending credit subscription to subscribe again.");
        }

        $plan = PlanService::getById($plan_id);
        return Subscription::create([
            "user_id" => $user_id,
            "plan_id" => $plan->id,
            "currency_id" => $plan->currency_id,
            "price" => $plan->price,
            "paid_on" => $paid_on,
            "expires_at" => now()->addDays($plan->duration),
            "status" => StatusConstants::ACTIVE
        ]);
    }

    public static function subscribeFromWallet($user_id, $plan_id)
    {
        DB::beginTransaction();
        try {
            $user = auth()->user();
            $sub = Subscription::where([
                "user_id"=> $user->id,
                "status" => StatusConstants::ACTIVE
            ])->first();
            if(!empty($sub->status ?? "" == StatusConstants::ACTIVE) ){
                throw new SubscriptionException("You are currently on an active plan");
            }else{
            $plan = PlanService::getById($plan_id);
            $subscription = self::subscribeToPlan($user_id, $plan->id, now());
            $amount = $subscription->price;
            $currency_id = $plan->currency_id;
            $wallet = WalletService::getByCurrencyId($user_id, $currency_id);
            WalletService::debit($wallet, $amount);
            UserTransactionService::create([
                "user_id" => $wallet->user_id,
                "currency_id" => $wallet->currency_id,
                "amount" => $amount,
                "fees" => 0,
                "description" => "Subscribed to $plan->name plan",
                "activity" => TransactionActivityConstants::SUBSCRIBE_TO_NETWORK_PLAN,
                "batch_no" => null,
                "type" => TransactionConstants::DEBIT,
                "status" => StatusConstants::COMPLETED
            ]);
        }
            // UserSubscriptionService::signupBonus($user_id);
            // ReferralSubscriptionService::shareProfits($user_id, $currency_id, $amount);
            DB::commit();
        } catch (Exception $e) {
            ExceptionService::logAndBroadcast($e);
            DB::rollback();
            throw $e;
        }
    }

    public static function lastSubscription($user_id)
    {
        return Subscription::where("user_id", $user_id)
            ->where("expires_at", "<", now())
            ->whereHas("plan")
            ->with("plan")
            ->orWhere("status", StatusConstants::INACTIVE)
            ->orderby("expires_at", "desc")
            ->first();
    }

    public static function currentSubscription($user_id)
    {
        return Subscription::where("user_id", $user_id)
            ->where("expires_at", ">", now())
            ->whereHas("plan")
            ->with("plan")
            ->where("status", StatusConstants::ACTIVE)
            ->orderby("expires_at", "desc")
            ->first();
    }

    public static function listByUser($user_id)
    {
        Subscription::where("user_id", $user_id)
            ->whereDate("expires_at", "<=", now())
            ->update([
                "status" => StatusConstants::INACTIVE
            ]);
        return Subscription::where("user_id", $user_id)
            ->with("plan")
            ->orderby("expires_at", "desc")
            ->paginate();
    }
}
