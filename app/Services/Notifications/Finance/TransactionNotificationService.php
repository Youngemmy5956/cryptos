<?php

namespace App\Services\Notifications\Finance;

use App\Models\UserTransaction;
use App\Services\Notifications\AppMailerService;
use App\Services\System\Notifications\WebPushNotificationService;
use PhpParser\Node\Stmt\ElseIf_;

class TransactionNotificationService
{
    public static function completed(UserTransaction $transaction)
    {
        $user = $transaction->user;
        $admin = developer();
        if ($user) {
            AppMailerService::send([
                "data" => [
                    "user" => $user,
                    "transaction" => $transaction,
                ],
                "to" => $user->email,
                "template" => "emails.finance.transactions.completed",
                "subject" => "Transaction Completed",
            ]);
        } elseif ($admin) {
            AppMailerService::send([
                "data" => [
                    "user" => $user,
                    "transaction" => $transaction,
                ],
                "to" => $user->email,
                "template" => "emails.finance.transactions.completed",
                "subject" => "Transaction Completed",
            ]);
        }

        // WebPushNotificationService::notifyByUserId(
        //     $user->id,
        //     "Transaction Completed",
        //     "Your transaction with reference #$transaction->reference is complete",
        //     [
        //         "url" => route("user.wallets.index")
        //     ]
        // );
    }

    public static function declined(UserTransaction $transaction, $comment)
    {
        $user = $transaction->user;
        AppMailerService::send([
            "data" => [
                "user" => $user,
                "transaction" => $transaction,
                "comment" => $comment
            ],
            "to" => $user->email,
            "template" => "emails.finance.transactions.declined",
            "subject" => "Transaction Declined",
        ]);
        WebPushNotificationService::notifyByUserId(
            $user->id,
            "transaction Declined",
            "Your transaction with reference #$transaction->reference was declined",
            [
                "url" => route("auth.finance.transactions.index")
            ]
        );
    }
}
