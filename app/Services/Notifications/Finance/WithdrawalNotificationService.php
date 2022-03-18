<?php

namespace App\Services\Notifications\Finance;

use App\Models\WithdrawalRequest;
use App\Services\Notifications\AppMailerService;
use App\Services\System\Notifications\WebPushNotificationService;

class WithdrawalNotificationService
{
    public static function requestCompleted(WithdrawalRequest $withdrawal)
    {
        $user = $withdrawal->user;
        AppMailerService::send([
            "data" => [
                "user" => $user,
                "withdrawal" => $withdrawal,
            ],
            "to" => $user->email,
            "template" => "emails.finance.withdrawal_requests.completed",
            "subject" => "Withdrawal Request Completed",
        ]);
        WebPushNotificationService::notifyByUserId(
            $user->id,
            "Withdrawal Completed",
            "Your withdrawal request is complete",
            [
                "url" => route("auth.finance.wallets.withdrawal_requests")
            ]
        );
    }

    public static function requestDeclined(WithdrawalRequest $withdrawal , $comment)
    {
        $user = $withdrawal->user;
        AppMailerService::send([
            "data" => [
                "user" => $user,
                "withdrawal" => $withdrawal,
                "comment" => $comment
            ],
            "to" => $user->email,
            "template" => "emails.finance.withdrawal_requests.declined",
            "subject" => "Withdrawal Request Declined",
        ]);
        WebPushNotificationService::notifyByUserId(
            $user->id,
            "Withdrawal Declined",
            "Your withdrawal request was declined",
            [
                "url" => route("auth.finance.wallets.withdrawal_requests")
            ]
        );
    }


}
