<?php

namespace App\Services\System\Promotions;

use App\Constants\CurrencyConstants;
use App\Models\User;
use App\Services\Notifications\AppMailerService;
use Exception;

class GiveawayService
{

    public static function notifyUsersAboutRoom()
    {
        $users = User::where("id" , ">" , 55)->get();

        foreach ($users as $user) {
            AppMailerService::send([
                "data" => [
                    "user" => $user,
                    "currency_type" => CurrencyConstants::BRONZE,
                    "amount" => number_format(100),
                ],
                "to" => $user->email,
                "template" => "emails.promotions.join_room_giveaway",
                "subject" => "New Feature Notification",
            ]);
            sleep(5);
        }
    }
}
