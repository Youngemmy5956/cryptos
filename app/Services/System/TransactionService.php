<?php

namespace App\Services\System;

use App\Constants\StatusConstants;
use App\Constants\TransactionActivityConstants;
use App\Constants\TransactionConstants;
use App\Models\FastestFingerPlayer;
use App\Models\FastestFingerRound;
use App\Services\Finance\UserTransactionService;
use App\Services\Finance\Wallet\WalletService;
use Exception;

class TransactionService
{

    public static function recordFastestFingerRoundRevenue(FastestFingerRound $round)
    {
        $round->refresh();
        $total_entry_fee = FastestFingerPlayer::where("round_id", $round->id)->sum("entry_fee");
        $total_coins_earned = FastestFingerPlayer::where("round_id", $round->id)->sum("coins_earned");
        $calculated_amount = $total_entry_fee - $total_coins_earned;
        $amount = abs($calculated_amount);
        $transaction_type = TransactionConstants::CREDIT;

        if ($calculated_amount == 0) {
            return;
        }

        if ($calculated_amount < 0) {
            $transaction_type = TransactionConstants::DEBIT;
        }

        $sudo = developer();
        $system_wallet = WalletService::getByCurrencyId($sudo->id, $round->currency_id);

        if ($transaction_type == TransactionConstants::CREDIT) {
            WalletService::credit($system_wallet, $amount);
        } else {
            WalletService::debit($system_wallet, $amount);
        }

        UserTransactionService::create([
            "user_id" => $system_wallet->user_id,
            "currency_id" => $system_wallet->currency_id,
            "amount" => $amount,
            "fees" => 0,
            "description" => "Fastest Finger " . $round->title . " revenue",
            "activity" => TransactionActivityConstants::FASTEST_FINGER,
            "batch_no" => null,
            "type" => $transaction_type,
            "status" => StatusConstants::COMPLETED
        ]);
    }


    public static function recordWithdrawalWithBankRevenue($currency_id, float $amount)
    {
        $sudo = developer();
        $system_wallet = WalletService::getByCurrencyId($sudo->id, $currency_id);
        WalletService::credit($system_wallet, $amount);
        UserTransactionService::create([
            "user_id" => $system_wallet->user_id,
            "currency_id" => $system_wallet->currency_id,
            "amount" => $amount,
            "fees" => 0,
            "description" => "Withdrawal fee revenue",
            "activity" => TransactionActivityConstants::WITHDRAW_WITH_BANK,
            "batch_no" => null,
            "type" => TransactionConstants::CREDIT,
            "status" => StatusConstants::COMPLETED
        ]);
    }


    public static function recordRewardReferrerBonus($currency_id, float $amount)
    {
        $sudo = developer();
        $system_wallet = WalletService::getByCurrencyId($sudo->id, $currency_id);
        WalletService::debit($system_wallet, $amount);
        UserTransactionService::create([
            "user_id" => $system_wallet->user_id,
            "currency_id" => $system_wallet->currency_id,
            "amount" => $amount,
            "fees" => 0,
            "description" => "Referral bonus payout",
            "activity" => TransactionActivityConstants::REFERRAL_BONUS,
            "batch_no" => null,
            "type" => TransactionConstants::DEBIT,
            "status" => StatusConstants::COMPLETED
        ]);
    }

    public static function recordSignupBonus($currency_id, float $amount)
    {
        $sudo = developer();
        $system_wallet = WalletService::getByCurrencyId($sudo->id, $currency_id);
        WalletService::debit($system_wallet, $amount);
        UserTransactionService::create([
            "user_id" => $system_wallet->user_id,
            "currency_id" => $system_wallet->currency_id,
            "amount" => $amount,
            "fees" => 0,
            "description" => "Signup bonus payout",
            "activity" => TransactionActivityConstants::SIGNUP_BONUS,
            "batch_no" => null,
            "type" => TransactionConstants::DEBIT,
            "status" => StatusConstants::COMPLETED
        ]);
    }

    public static function recordCurrencySwapRevenue($currency_id, float $amount)
    {
        $sudo = developer();
        $system_wallet = WalletService::getByCurrencyId($sudo->id, $currency_id);
        WalletService::credit($system_wallet, $amount);
        UserTransactionService::create([
            "user_id" => $system_wallet->user_id,
            "currency_id" => $system_wallet->currency_id,
            "amount" => $amount,
            "fees" => 0,
            "description" => "Currency exchange revenue",
            "activity" => TransactionActivityConstants::CURRENCY_EXCHANGE,
            "batch_no" => null,
            "type" => TransactionConstants::CREDIT,
            "status" => StatusConstants::COMPLETED
        ]);
    }

    public static function recordNewActivityLevelRevenue($currency_id, float $amount)
    {
        $sudo = developer();
        $system_wallet = WalletService::getByCurrencyId($sudo->id, $currency_id);
        WalletService::debit($system_wallet, $amount);
        UserTransactionService::create([
            "user_id" => $system_wallet->user_id,
            "currency_id" => $system_wallet->currency_id,
            "amount" => $amount,
            "fees" => 0,
            "description" => "Activity level promotion bonus",
            "activity" => TransactionActivityConstants::ACTIVITY_LEVEL,
            "batch_no" => null,
            "type" => TransactionConstants::DEBIT,
            "status" => StatusConstants::COMPLETED
        ]);
    }

    public static function recordJoinedRoomBonus($currency_id, float $amount)
    {
        $sudo = developer();
        $system_wallet = WalletService::getByCurrencyId($sudo->id, $currency_id);
        WalletService::debit($system_wallet, $amount);
        UserTransactionService::create([
            "user_id" => $system_wallet->user_id,
            "currency_id" => $system_wallet->currency_id,
            "amount" => $amount,
            "fees" => 0,
            "description" => "Joined room bonus payout",
            "activity" => TransactionActivityConstants::JOINED_ROOM_BONUS,
            "batch_no" => null,
            "type" => TransactionConstants::DEBIT,
            "status" => StatusConstants::COMPLETED
        ]);
    }

    public static function recordWalletTransferRevenue($currency_id, float $amount)
    {
        $sudo = developer();
        $system_wallet = WalletService::getByCurrencyId($sudo->id, $currency_id);
        WalletService::credit($system_wallet, $amount);
        UserTransactionService::create([
            "user_id" => $system_wallet->user_id,
            "currency_id" => $system_wallet->currency_id,
            "amount" => $amount,
            "fees" => 0,
            "description" => "Wallet transfer revenue",
            "activity" => TransactionActivityConstants::CURRENCY_EXCHANGE,
            "batch_no" => null,
            "type" => TransactionConstants::CREDIT,
            "status" => StatusConstants::COMPLETED
        ]);
    }

    public static function recordSubscriptionRevenue($currency_id, float $original_amount)
    {
        $amount = abs($original_amount);
        $transaction_type = TransactionConstants::CREDIT;

        if ($amount == 0) {
            return;
        }

        if ($original_amount < 0) {
            $transaction_type = TransactionConstants::DEBIT;
        }

        $sudo = developer();
        $system_wallet = WalletService::getByCurrencyId($sudo->id, $currency_id);

        if ($transaction_type == TransactionConstants::CREDIT) {
            WalletService::credit($system_wallet, $amount);
        } else {
            WalletService::debit($system_wallet, $amount);
        }
        UserTransactionService::create([
            "user_id" => $system_wallet->user_id,
            "currency_id" => $system_wallet->currency_id,
            "amount" => $amount,
            "fees" => 0,
            "description" => "Revenue after network share distribution",
            "activity" => TransactionActivityConstants::SUBSCRIBE_TO_NETWORK_PLAN,
            "batch_no" => null,
            "type" => $transaction_type,
            "status" => StatusConstants::COMPLETED
        ]);
    }

    public static function recordPlanSubscriptionBonus($currency_id, float $amount)
    {
        $sudo = developer();
        $system_wallet = WalletService::getByCurrencyId($sudo->id, $currency_id);
        WalletService::debit($system_wallet, $amount);
        UserTransactionService::create([
            "user_id" => $system_wallet->user_id,
            "currency_id" => $system_wallet->currency_id,
            "amount" => $amount,
            "fees" => 0,
            "description" => "Instant subscription bonus for plan.",
            "activity" => TransactionActivityConstants::SUBSCRIBE_TO_NETWORK_PLAN,
            "batch_no" => null,
            "type" => TransactionConstants::DEBIT,
            "status" => StatusConstants::COMPLETED
        ]);
    }

    public static function recordPlanSubscriptionActivityBonus($currency_id, float $amount)
    {
        $sudo = developer();
        $system_wallet = WalletService::getByCurrencyId($sudo->id, $currency_id);
        WalletService::debit($system_wallet, $amount);
        UserTransactionService::create([
            "user_id" => $system_wallet->user_id,
            "currency_id" => $system_wallet->currency_id,
            "amount" => $amount,
            "fees" => 0,
            "description" => "Subscription daily activity  bonus.",
            "activity" => TransactionActivityConstants::SUBSCRIPTION_DAILY_ACTIVITY,
            "batch_no" => null,
            "type" => TransactionConstants::DEBIT,
            "status" => StatusConstants::COMPLETED
        ]);
    }

    public static function recordSystemCredit($currency_id, float $amount)
    {
        $sudo = developer();
        $system_wallet = WalletService::getByCurrencyId($sudo->id, $currency_id);
        WalletService::debit($system_wallet, $amount);
        UserTransactionService::create([
            "user_id" => $system_wallet->user_id,
            "currency_id" => $system_wallet->currency_id,
            "amount" => $amount,
            "fees" => 0,
            "description" => "Record system credit",
            "activity" => TransactionActivityConstants::SYSTEM_CREDIT,
            "batch_no" => null,
            "type" => TransactionConstants::DEBIT,
            "status" => StatusConstants::COMPLETED
        ]);
    }

    public static function recordFastestFingerReferrerBonus($currency_id, float $amount)
    {
        $sudo = developer();
        $system_wallet = WalletService::getByCurrencyId($sudo->id, $currency_id);
        WalletService::debit($system_wallet, $amount);
        UserTransactionService::create([
            "user_id" => $system_wallet->user_id,
            "currency_id" => $system_wallet->currency_id,
            "amount" => $amount,
            "fees" => 0,
            "description" => "Fastest finger referrer bonus.",
            "activity" => TransactionActivityConstants::FASTEST_FINGER_REFERRER_BONUS,
            "batch_no" => null,
            "type" => TransactionConstants::DEBIT,
            "status" => StatusConstants::COMPLETED
        ]);
    }

    public static function recordStoryPayout($currency_id, float $amount)
    {
        $sudo = developer();
        $system_wallet = WalletService::getByCurrencyId($sudo->id, $currency_id);
        WalletService::debit($system_wallet, $amount);
        UserTransactionService::create([
            "user_id" => $system_wallet->user_id,
            "currency_id" => $system_wallet->currency_id,
            "amount" => $amount,
            "fees" => 0,
            "description" => "Fastest finger referrer bonus.",
            "activity" => TransactionActivityConstants::STORYBOOK_EARNING,
            "batch_no" => null,
            "type" => TransactionConstants::DEBIT,
            "status" => StatusConstants::COMPLETED
        ]);
    }

    public static function recordMiningPayout($currency_id, float $amount)
    {
        $sudo = developer();
        $system_wallet = WalletService::getByCurrencyId($sudo->id, $currency_id);
        WalletService::debit($system_wallet, $amount);
        UserTransactionService::create([
            "user_id" => $system_wallet->user_id,
            "currency_id" => $system_wallet->currency_id,
            "amount" => $amount,
            "fees" => 0,
            "description" => "Mining Payout.",
            "activity" => TransactionActivityConstants::CRYPTO_MINING,
            "batch_no" => null,
            "type" => TransactionConstants::DEBIT,
            "status" => StatusConstants::COMPLETED
        ]);
    }
}
