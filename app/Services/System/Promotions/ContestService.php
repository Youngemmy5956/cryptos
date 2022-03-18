<?php

namespace App\Services\System\Promotions;

use App\Constants\CurrencyConstants;
use App\Models\User;
use App\Services\Notifications\AppMailerService;
use Exception;

class ContestService
{

    public static function notifyUsers()
    {
        $users = User::get();
        foreach ($users as $user) {
            AppMailerService::send([
                "data" => [
                    "user" => $user,
                ],
                "to" => $user->email,
                "template" => "emails.promotions.referral_contest",
                "subject" => "Referral Contest 1.0",
            ]);
            sleep(5);
        }
    }
}
