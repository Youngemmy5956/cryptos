<?php
namespace App\Helpers;


class PriceConverter{

    const NAIRA_PER_DOLLAR_RATE = 500;

    public static function dollarToNaira($amount)
    {
        return $amount * self::NAIRA_PER_DOLLAR_RATE;
    }

    public static function nairaToDollar($amount)
    {
        return $amount / self::NAIRA_PER_DOLLAR_RATE;
    }
}
