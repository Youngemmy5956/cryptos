<?php

namespace App\Services\Wallet;

use App\Exceptions\Wallet\WalletException;
use App\Models\Currency;

class CurrencyService
{

    const CURRENCY_NOT_FOUND = 3404;

    public static function getByType($type): Currency
    {
        $currency = Currency::where("type", $type)->first();

        if (empty($currency)) {
            throw new WalletException(
                "Currency not found",
                self::CURRENCY_NOT_FOUND
            );
        }
        return $currency;
    }

    public static function getById($id): Currency
    {
        $currency = Currency::where("id", $id)->first();

        if (empty($currency)) {
            throw new WalletException(
                "Currency not found",
                self::CURRENCY_NOT_FOUND
            );
        }
        return $currency;
    }
}
