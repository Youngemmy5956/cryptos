<?php

namespace App\Constants;

class CurrencyConstants
{

    const CURRENCY_GROUP = "Currency";
    const DOLLAR_CURRENCY = "Dollar";
    const NAIRA_CURRENCY = "Naira";

    // Coin group
    const COIN_GROUP = "Coin";
    const BRONZE = "Bronze";
    const SILVER = "Silver";
    const GOLD = "Gold";
    const SHIBAINU = "Shiba";
    const SEAL = "Seal";

    const GROUP_BY_TYPE = [
        self::DOLLAR_CURRENCY => self::CURRENCY_GROUP,
        self::BRONZE => self::COIN_GROUP
    ];

    const CURRENCIES = [
        self::DOLLAR_CURRENCY,
        self::NAIRA_CURRENCY
    ];
    const PROVIDER = "Provider";
    const FLUTTERWAVE = "Flutterwave";
    const FUND_WITH_CARD = "Card";
    const FUND_WITH_BANK = "Bank";
    const WITHDRAW_WITH_BANK = "Bank";

    const FUND_WALLET_OPTIONS = [
        self::CURRENCY_GROUP => [
            self::FUND_WITH_CARD,
            self::FUND_WITH_BANK,
            self::PROVIDER,
        ],
        self::COIN_GROUP => []
    ];

    const WITHDRAW_FROM_WALLET_OPTIONS = [
        self::CURRENCY_GROUP => [
            self::PROVIDER,
            self::WITHDRAW_WITH_BANK
        ],
        self::COIN_GROUP => []
    ];

    const PAYMENT_GATEWAYS = [
        [
            "name" => "Flutterwave",
            "logo" => "data:image/png;base64,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",
            "key" => CurrencyConstants::FLUTTERWAVE,
            "percentage_fees" =>  [
                self::DOLLAR_CURRENCY => "3.8",
                self::NAIRA_CURRENCY => "1.4"
            ],
            "supported_currencies" => [
                self::DOLLAR_CURRENCY,
                self::NAIRA_CURRENCY
            ]
        ]
    ];

    const FLUTTERWAVE_SUPPORTED_CURRENCIES = ["USD", "NGN"];

    public static function toDollar($rate)
    {
        return 1 / $rate;
    }
}
