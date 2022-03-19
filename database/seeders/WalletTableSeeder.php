<?php

namespace Database\Seeders;

use App\Constants\CurrencyConstants;
use App\Constants\StatusConstants;
use App\Constants\TransactionActivityConstants;
use App\Constants\TransactionConstants;
use App\Services\Finance\DefaultUserWalletsService;
use App\Services\Wallet\WalletService;
use App\Services\System\TransactionService;
use App\Services\Wallet\UserTransactionService;
use Illuminate\Database\Seeder;

class WalletTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // TransactionService::recordSystemCredit(3 , 10000);

        $creditAmount = 1000;
        $wallet = WalletService::getByCurrencyType(3 , CurrencyConstants::NAIRA_CURRENCY);
        WalletService::credit($wallet , $creditAmount);
        UserTransactionService::create([
            "user_id" => $wallet->user_id,
            "currency_id" => $wallet->currency_id,
            "amount" => $creditAmount,
            "fees" => 0,
            "description" => "Funded account",
            "activity" => TransactionActivityConstants::SYSTEM_CREDIT,
            "batch_no" => null,
            "type" => TransactionConstants::CREDIT,
            "status" => StatusConstants::COMPLETED
        ]);
        // TransactionService::recordSystemCredit($wallet->currency_id , $creditAmount);

        $wallet = WalletService::getByCurrencyType(5 , CurrencyConstants::NAIRA_CURRENCY);
        WalletService::credit($wallet , $creditAmount);
        UserTransactionService::create([
            "user_id" => $wallet->user_id,
            "currency_id" => $wallet->currency_id,
            "amount" => $creditAmount,
            "fees" => 0,
            "description" => "Funded account",
            "activity" => TransactionActivityConstants::SYSTEM_CREDIT,
            "batch_no" => null,
            "type" => TransactionConstants::CREDIT,
            "status" => StatusConstants::COMPLETED
        ]);
        // TransactionService::recordSystemCredit($wallet->currency_id , $creditAmount);
    }

}
