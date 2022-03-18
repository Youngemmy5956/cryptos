<?php

namespace App\Services\Wallet;

use App\Constants\StatusConstants;
use App\Constants\TransactionConstants;
use App\Models\UserTransaction;
use App\Services\Auth\ReferralService;
use App\Services\Wallet\WalletService;
use App\Services\Notifications\Finance\TransactionNotificationService;

class UserTransactionStatusService
{

    public static function update($transaction, array $data)
    {
        $status = $data["status"];
        if (in_array($status, [StatusConstants::COMPLETED])) {
            if ($transaction->type == TransactionConstants::CREDIT) {
                $creditAmount = $transaction->amount - $transaction->fees;
                $wallet = WalletService::getByCurrencyId($transaction->user_id, $transaction->currency_id);
                WalletService::credit($wallet, $creditAmount);

                // if (ReferralService::amountIsEligible($creditAmount, $wallet->currency->price_per_dollar)) {
                //     ReferralService::rewardReferrerIfEligible($wallet->user_id);
                // }

                TransactionNotificationService::completed($transaction);
            }
        }

        if (in_array($status, [StatusConstants::DECLINED])) {
            TransactionNotificationService::declined($transaction, "");
        }

        self::updateLog($transaction , $status,  $data["comment"] ?? null);
    }

    public static function updateLog(UserTransaction $transaction, $status, $comment = null)
    {
        $actor = auth()->user();
        $transaction->refresh();
        $logs = json_decode($transaction->logs, true);
        $logs[] = [
            "status" => $status,
            "timestamp" => now(),
            "actor_id" => $actor->id,
            "actor_name" => $actor->names(),
            "comment" => $comment
        ];

        $transaction->update([
            "status" => $status,
            "logs" => json_encode($logs)
        ]);
    }
}
