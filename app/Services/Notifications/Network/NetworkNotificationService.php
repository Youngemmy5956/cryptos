<?php

namespace App\Services\Notifications\Network;

use App\Models\ReferralBonus;
use App\Models\Subscription;
use App\Models\User;
use App\Services\Notifications\AppMailerService;

class NetworkNotificationService
{
    public static function subscriptionBonus(ReferralBonus $referralBonus)
    {
        $user = $referralBonus->user;
        AppMailerService::send([
            "data" => [
                "user" => $user,
                "amount" => $referralBonus->amount . " " . $referralBonus->currency->short_name,
            ],
            "to" => $user->email,
            "template" => "emails.network.subscription_bonus",
            "subject" => "Network Earnings - Zinghunt",
        ]);
    }

    public static function missedSubscriptionBonus(User $user, $plan_name)
    {
        AppMailerService::send([
            "data" => [
                "user" => $user,
                "plan_name" => $plan_name
            ],
            "to" => $user->email,
            "template" => "emails.network.missed_subscription_bonus",
            "subject" => "Missed Network Earnings - Zinghunt",
        ]);
    }

    public static function expiringSubscriptionReminder(Subscription $subscription)
    {
        $user = $subscription->user;
        AppMailerService::send([
            "data" => [
                "user" => $user,
                "plan_name" => $subscription->plan->name,
                "date" => date("l, M d , Y \a\\t h:i A" , strtotime($subscription->expires_at))
            ],
            "to" => $user->email,
            "template" => "emails.network.expiring_subscription_reminder",
            "subject" => "Your Subscription Expires Soon - Zinghunt",
        ]);
    }

    public static function expiredSubscription(Subscription $subscription)
    {
        $user = $subscription->user;
        $plan_name = $subscription->plan->name;
        AppMailerService::send([
            "data" => [
                "user" => $user,
                "plan_name" => $plan_name,
            ],
            "to" => $user->email,
            "template" => "emails.network.expired_subscription",
            "subject" => "$plan_name Subscription Expired - Zinghunt",
        ]);
    }
}
