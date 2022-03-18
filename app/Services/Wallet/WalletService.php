<?php

namespace App\Services\Wallet;

use App\Models\Wallet;
use Illuminate\Support\Collection;
use App\Constants\CurrencyConstants;
use App\Services\Wallet\CurrencyService;
use App\Exceptions\Wallet\WalletException;
use App\Exceptions\Wallet\WalletException as WalletWalletException;

class WalletService
{

    const INSUFFICIENT_COINS_ERROR = 3000;
    const WALLET_NOT_FOUND = 3404;

    public static function getByCurrencyType($user_id, $type): Wallet
    {
        $wallet = Wallet::where("user_id", $user_id)
            ->whereHas("currency", function ($query) use ($type) {
                $query->where("type", $type);
            })
            ->first();

        if (empty($wallet)) {

            // if (!in_array($type, [
            //     CurrencyConstants::DOLLAR_CURRENCY,
            //     CurrencyConstants::NAIRA_CURRENCY,
            //     CurrencyConstants::BRONZE
            // ])) {
            //     self::walletNotFound();
            // }

            $currency = CurrencyService::getByType($type);
            $wallet = Wallet::create([
                "user_id" => $user_id,
                "currency_id" => $currency->id,
                "balance" => 0,
            ]);
        }
        return $wallet;
    }

    public static function getByCurrencyId($user_id, $currency_id): Wallet
    {
        $wallet = Wallet::where("user_id", $user_id)
            ->where("currency_id", $currency_id)
            ->first();

        if (empty($wallet)) {
            $currency = CurrencyService::getById($currency_id);
            $wallet = Wallet::create([
                "user_id" => $user_id,
                "currency_id" => $currency->id,
                "locked_balance" => 0,
                "balance" => 0,
            ]);
        }
        return $wallet;
    }


    public static function getByUserId($user_id): Collection
    {
        return Wallet::where("user_id", $user_id)->with("currency")->get();
    }


    private static function walletNotFound()
    {
        throw new WalletException(
            "Wallet not found",
            self::WALLET_NOT_FOUND
        );
    }


    public static function getById($id): Wallet
    {
        $wallet = Wallet::where("id", $id)->first();
        dd($wallet);
        if (empty($wallet)) {
            throw new WalletException(
                "Wallet not found",
                self::WALLET_NOT_FOUND
            );
        }
        return $wallet;
    }


    public static function debit(Wallet $wallet, float $amount)
    {
        $wallet->refresh();
        $sudo_id = developer()->id;
        if ($wallet->balance < $amount && $wallet->user_id != $sudo_id) {
            throw new WalletException(
                "You don`t have enough " . $wallet->currency->name . "(s) for this transaction!",
                self::INSUFFICIENT_COINS_ERROR
            );
        }
        $wallet->update([
            "balance" => $wallet->balance - $amount,
            "total_debit" => $wallet->total_debit + $amount
        ]);
    }


    public static function credit(Wallet $wallet, float $amount)
    {
        $wallet->refresh();
        $wallet->update([
            "balance" => $wallet->balance + $amount,
            "total_credit" => $wallet->total_credit + $amount
        ]);
    }

}
