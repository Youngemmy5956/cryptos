<?php

namespace App\Constants;

class TransactionConstants
{

    const DEBIT = "Debit";
    const CREDIT = "Credit";

    const WALLET_TRANSFER_PERCENT_FEE = 1;
    const WALLET_WITHDRAWAL_WITH_BANK_PERCENT_FEE = 2;
    const WALLET_WITHDRAWAL_WITH_BANK_MINIMUM_AMOUNT = 3000;

    const FIXED_VALUE = "Fixed";
    const PERCENTAGE_VALUE = "Percentage";

    const MANUAL_PAYMENT_BANKS = [
        // [
        //     "account_name" => "ROOTTECH FLW",
        //     "account_number" => "8222003642",
        //     "bank_name" => "STERLING BANK PLC"
        // ],
        [
            "account_name" => "Wallets Africa/RootTech",
            "account_number" => "7198343890",
            "bank_name" => "Wema Bank"
        ]
    ];

    const MANUAL_DEPOSIT_FIXED_FEE = 100;

}
