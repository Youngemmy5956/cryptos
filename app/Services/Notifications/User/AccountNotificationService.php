<?php

namespace App\Services\Notifications\User;

use App\Models\Provider;
use App\Models\User;
use App\Services\Notifications\AppMailerService;

class AccountNotificationService
{
    public static function welcomeNewUser(User $user)
    {
        AppMailerService::send([
            "data" => [
                "user" => $user,
                "provider_name" => null,
                "referred_by_provider" => false,
                "password" => null
            ],
            "to" => $user->email,
            "template" => "emails.user.welcome",
            "subject" => "Welcome to ZingHunt",
        ]);
    }

    public static function welcomeNewUserFromProvider(Provider $provider, User $user ,string $password)
    {
        AppMailerService::send([
            "data" => [
                "user" => $user,
                "provider_name" => $provider->name,
                "referred_by_provider" => true,
                "password" => $password
            ],
            "to" => $user->email,
            "template" => "emails.user.welcome",
            "subject" => "Welcome to ZingHunt",
        ]);
    }
}
