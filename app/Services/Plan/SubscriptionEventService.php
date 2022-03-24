<?php

namespace App\Services\Plan;

use App\Constants\StatusConstants;
use App\Constants\TransactionActivityConstants;
use App\Constants\TransactionConstants;
use App\Exceptions\Plan\SubscriptionException;
use App\Models\Plan;
use App\Models\Subscription;
use App\Models\User;
use App\Services\Finance\UserTransactionService;
use App\Services\Finance\Wallet\WalletService;
use App\Services\Notifications\Network\NetworkNotificationService;
use App\Services\System\ExceptionService;
use Exception;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class SubscriptionEventService
{

    public static function notifyExpiringSubscribers()
    {
        $subscriptions = Subscription::whereDate("expires_at", today()->tomorrow())
            ->where("status", StatusConstants::ACTIVE)
            ->with(["user", "plan"])
            ->get();

        foreach ($subscriptions as $subscription) {
            NetworkNotificationService::expiringSubscriptionReminder($subscription);
        }
    }

    public static function disableExpiredSubscriptions()
    {
        $subscriptions = Subscription::whereDate("expires_at", "<=", now())
            ->where("status", StatusConstants::ACTIVE)
            ->with(["user", "plan"])
            ->get();

        foreach ($subscriptions as $subscription) {
            NetworkNotificationService::expiredSubscription($subscription);
        }
    }
}
