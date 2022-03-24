<?php

namespace Database\Seeders;

use App\Constants\AppConstants;
use App\Models\User;
use App\Services\Auth\ReferralService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {
        $users = [
            [
                "first_name" => "Super",
                "last_name" => "Admin",
                "email" => AppConstants::SUDO_EMAIL,
                "picture_id" => null,
                "email_verified_at" => now(),
                "password" =>Hash::make("sudo_adpass")
            ],
            [
                "first_name" => "Morrison",
                "last_name" => "Hodley",
                "email" => "morrison@cryptoinvest.com",
                "picture_id" => null,
                "email_verified_at" => now(),
                "password" => Hash::make("password")
            ],
            [
                "first_name" => "Morrison",
                "last_name" => "Hodley",
                "email" => "Hodmor24@gmail.com",
                "picture_id" => null,
                "email_verified_at" => now(),
                "password" => Hash::make("password")
            ],
            [

                "first_name" => "Emmanuel",
                "last_name" => "Nwamini",
                "email" => "emmanuel@cryptoinvest.com",
                "picture_id" => null,
                "email_verified_at" => now(),
                "password" =>Hash::make("password")
            ],
            [
                "first_name" => "Emmanuel",
                "last_name" => "Nwamini",
                "email" => "emmanuelgodwin558@@gmail.com",
                "picture_id" => null,
                "email_verified_at" => now(),
                "password" => Hash::make("password")
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
