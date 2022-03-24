<?php

namespace App\Services\Notifications\Finance;

use App\Services\Finance\UserTransactionService;
use App\Services\Notifications\AppMailerService;

class WalletNotificationService
{
    public static function newBankPayment($transaction_id)
    {
        $transaction = UserTransactionService::getById($transaction_id);
        AppMailerService::send([
            "data" => [
                "user" => $transaction->user,
                "amount" => number_format($transaction->amount),
                "description" => $transaction->description
            ],
            "to" => "zinghunt@gmail.com",
            "template" => "emails.finance.payments.new",
            "subject" => "New Payment Notification",
        ]);
    }
}
