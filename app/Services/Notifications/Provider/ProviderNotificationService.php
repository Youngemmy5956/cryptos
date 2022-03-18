<?php

namespace App\Services\Notifications\Provider;

use App\Models\Currency;
use App\Models\Provider;
use App\Models\ProviderUser;
use App\Models\WithdrawalRequest;
use App\Services\Notifications\AppMailerService;

class ProviderNotificationService
{
    public static function insufficientWalletBalance(
        Provider $provider,
        ProviderUser $providerUser,
        Currency $currency,
        float $amount
    ) {
        $user = $provider->user;
        AppMailerService::send([
            "data" => [
                "user" => $user,
                "provider" => $provider,
                "currency" => $currency,
                "providerUser" => $providerUser,
                "amount" => $amount
            ],
            "to" => $user->email,
            "template" => "emails.provider.insufficient_balance",
            "subject" => "Insufficient Balance Notification",
        ]);
    }
}
