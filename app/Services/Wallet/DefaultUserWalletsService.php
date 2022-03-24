<?php

namespace App\Services\Wallet;

use App\Constants\CurrencyConstants;
use App\Models\User;
use App\Services\Wallet\WalletService;

class DefaultUserWalletsService             
{

    public static function setup(User $user)
    {
        // WalletService::getByCurrencyType($user->id , CurrencyConstants::DOLLAR_CURRENCY);
        WalletService::getByCurrencyType($user->id , CurrencyConstants::NAIRA_CURRENCY);
        // WalletService::getByCurrencyType($user->id , CurrencyConstants::BRONZE);
    }

}
