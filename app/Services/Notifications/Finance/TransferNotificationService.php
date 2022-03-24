<?php

namespace App\Services\Notifications\Finance;

use App\Models\User;
use App\Services\Finance\Wallet\WalletTransferService;
use App\Services\Notifications\AppMailerService;
use App\Services\System\Notifications\WebPushNotificationService;

class TransferNotificationService
{
    public static function requestCompleted(WalletTransferService $transfer)
    {
       $user = $transfer(['sender']);
        AppMailerService::send([
            "data" => [
                "user" => $user,
                "transfer" => $transfer,
            ],
            "to" => $user->email,
            "template" => "emails.finance.transfers.completed",
            "subject" => "Transfer Completed",
        ]);
        WebPushNotificationService::notifyByUserId(
            $user->id,
            "Transfer Completed",
            "Your transfer request is complete",
            // [
            //     "url" => route("auth.finance.wallets.withdrawal_requests")
            // ]
        );
    }

    public static function requestDeclined(WalletTransferService $transfer, $comment)
    {
        $user = $transfer->user;
        AppMailerService::send([
            "data" => [
                "user" => $user,
                "transfer" => $transfer,
                "comment" => $comment
            ],
            "to" => $user->email,
            "template" => "emails.finance.transfers.declined",
            "subject" => "Transfer Declined",
        ]);
        WebPushNotificationService::notifyByUserId(
            $user->id,
            "Transfer Declined",
            "Your transfer request was declined",
            // [
            //     "url" => route("auth.finance.wallets.withdrawal_requests")
            // ]
        );
    }


}
