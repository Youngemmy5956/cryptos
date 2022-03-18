<?php

namespace App\Services\Auth;

use App\Constants\CurrencyConstants;
use App\Constants\StatusConstants;
use App\Constants\TransactionActivityConstants;
use App\Constants\TransactionConstants;
use App\Models\Provider;
use App\Models\User;
use App\Services\Finance\UserTransactionService;
use App\Services\Wallet\DefaultUserWalletsService;
use App\Services\Finance\Wallet\WalletService;
use App\Services\Notifications\User\AccountNotificationService;
use App\Services\System\TransactionService;
use Illuminate\Support\Facades\Hash;

class RegisterationService
{

    public static function getNames($name)
    {
        $names = explode(" ", $name);

        if (count($names) > 1) {
            $data = [
                "first_name" => $names[0],
                "last_name" => $names[1],
            ];
        } else {
            $data = [
                "first_name" => $names[0],
                "last_name" => null,
            ];
        }
        return $data;
    }

    public static function generateUsername($firstname, $lastname = "", int $suffix = null)
    {
        $lastname = $lastname ?? " ";
        $username = $firstname . $lastname[0] ?? "";
        $username .= "$suffix";

        $check = User::where("username", $username)->count();
        if ($check > 0) {
            return self::generateUsername($firstname, $lastname, ((int)$suffix) + 1);
        }
        return slugify(str_replace(" ", "", $username));
    }


    public static function createUser($name, $email, $password): User
    {
        $data = array_merge([
            "email" => $email,
            "password" => $password
        ], self::getNames($name));
        $data["username"] = self::generateUsername($data["first_name"], $data["last_name"]);
        $data["ref_code"] = strtoupper(getRandomToken(8));
        $data["password"] = Hash::make($data['password']);

        return User::create($data);
    }

    // public static function createProviderUser(Provider $provider, string $name, string $email): User
    // {
    //     $password = getRandomToken(6);
    //     $user = self::createUser($name, $email, $password);
    //     DefaultUserWalletsService::setup($user);
    //     AccountNotificationService::welcomeNewUserFromProvider($provider, $user, $password);
    //     // self::creditBonus($user);
    //     return $user;
    // }

    public static function postRegisterActions(User $user)
    {
        DefaultUserWalletsService::setup($user);
        // AccountNotificationService::welcomeNewUser($user);
        // self::creditBonus($user);
    }

    // public static function creditBonus(User $user)
    // {
    //     $total = User::count();
    //     if ($total < 100) {
    //         $creditAmount = 100;
    //         $wallet = WalletService::getByCurrencyType($user->id, CurrencyConstants::BRONZE);
    //         WalletService::credit($wallet, $creditAmount);
    //         UserTransactionService::create([
    //             "user_id" => $wallet->user_id,
    //             "currency_id" => $wallet->currency_id,
    //             "amount" => $creditAmount,
    //             "fees" => 0,
    //             "description" => "Signup bonus",
    //             "activity" => TransactionActivityConstants::SIGNUP_BONUS,
    //             "batch_no" => null,
    //             "type" => TransactionConstants::CREDIT,
    //             "status" => StatusConstants::COMPLETED
    //         ]);
    //         TransactionService::recordSignupBonus($wallet->currency_id, $creditAmount);
    //     }
    // }
}
