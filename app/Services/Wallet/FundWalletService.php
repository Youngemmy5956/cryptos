<?php

namespace App\Services\Wallet;

use Exception;
use App\Models\User;
use App\Models\UserTransaction;
use App\Constants\StatusConstants;
use Illuminate\Support\Facades\DB;
use App\Constants\CurrencyConstants;
use App\Services\Auth\ReferralService;
use App\Constants\TransactionConstants;
use App\Services\Wallet\CurrencyService;
use App\Services\Providers\ProviderService;
use App\Constants\TransactionActivityConstants;
use App\Exceptions\Wallet\FundWalletException;
use App\Services\Wallet\UserTransactionService;
use App\Services\PayementGateways\FlutterwaveService;
use App\Services\Providers\ProviderUserTransactionService;
use App\Services\Notifications\Finance\WalletNotificationService;
use App\Services\Wallet\WalletService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class FundWalletService
{


    public static function byGateway(string $gateway, string $currency_type, float $amount): array
    {
        $user = auth()->user();
        if ($gateway == CurrencyConstants::FLUTTERWAVE) {
            return self::withFlutterwave($user, $currency_type, $amount);
        }
        throw new FundWalletException("Gateway is currently inactve");

    }

    public static function withFlutterwave(User $user, $currency_type, float $amount): array
    {
        DB::beginTransaction();
        try {
            $callbackUrl = route("auth.payment.callback", ["gateway" => CurrencyConstants::FLUTTERWAVE]);
            $flutterwaveService = new FlutterwaveService;
            // dd($flutterwaveService);

            $currency = CurrencyService::getByType($currency_type);

            $transaction = UserTransactionService::create([
                "user_id" => $user->id,
                "currency_id" => $currency->id,
                "amount" => $amount,
                "description" => "Fund via Flutterwave",
                "activity" => TransactionActivityConstants::FUND_WITH_FLUTTERWAVE,
                "batch_no" => null,
                "status" => StatusConstants::PENDING
            ]);

            $initializeData = $flutterwaveService
                ->setCustomization(null, "Fund with Card")
                ->setCurrency($currency->short_name)
                ->setPaymentOption("Card")
                ->setCustomerData([
                    "name" => $user->first_name,
                    "email" => $user->email
                ])
                ->setMetaData([
                    "user_id" => $user->id,
                    "currency_type" => $currency_type,
                    "activity" => $transaction->activity,
                ])
                ->initialize($transaction->reference, $callbackUrl, $amount);

            if ($initializeData["status"] != "success") {
                throw new FundWalletException($initializeData["message"]);
            }

            DB::commit();
            return [
                "link" => $initializeData["data"]["link"],
                "success" => true,
                "message" => $initializeData["message"]
            ];
        } catch (Exception $e) {
            DB::rollback();
            throw new FundWalletException("Couldn`t initiate transaction with Flutterwave");
        }
    }


    public static function processGatewayCallback(UserTransaction $transaction): array
    {
        DB::beginTransaction();
        try {
            if ($transaction->status == StatusConstants::COMPLETED) {
                throw new FundWalletException("Transaction has been completed!");
            }

            $wallet = WalletService::getByCurrencyId($transaction->user_id, $transaction->currency_id);
            $amount = $transaction->amount;
            WalletService::credit($wallet, $amount);
            $transaction->update(["status" => StatusConstants::COMPLETED]);

            // if (ReferralService::amountIsEligible($amount, $wallet->currency->price_per_dollar)) {
            //     ReferralService::rewardReferrerIfEligible($wallet->user_id);
            // }

            DB::commit();
            return [
                "link" => route("user.wallets.index"),
                "success" => true,
                "message" => "Wallet funded successfully"
            ];
        } catch (Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    // public static function processBankPayment($user_id , $data)
    // {
    //     DB::beginTransaction();
    //     try {
    //         $validator = Validator::make($data, [
    //             "currency_type" => "required|exists:currencies,type",
    //             "account_number" => "required|string",
    //             "amount" => "required|string"
    //         ]);

    //         if ($validator->fails()) {
    //             throw new ValidationException($validator);
    //         }
    //         $data =  $validator->validated();

    //         $user = User::find($user_id);
    //         $amount = $data["amount"];
    //         $account_number = $data["account_number"];
    //         $wallet = WalletService::getByCurrencyType($user_id , $data["currency_type"]);

    //         $description = "Paid to Bank account $account_number with Reference Number: #$user->username";
    //         $transaction = UserTransactionService::create([
    //             "user_id" => $wallet->user_id,
    //             "currency_id" => $wallet->currency_id,
    //             "amount" => $amount,
    //             "fees" => TransactionConstants::MANUAL_DEPOSIT_FIXED_FEE,
    //             "description" => $description,
    //             "activity" => TransactionActivityConstants::FUND_WITH_BANK,
    //             "batch_no" => null,
    //             "type" => TransactionConstants::CREDIT,
    //             "status" => StatusConstants::PENDING
    //         ]);

    //         DB::commit();
    //         WalletNotificationService::newBankPayment($transaction->id);
    //         return $transaction;
    //     } catch (Exception $e) {
    //         DB::rollback();
    //         throw $e;
    //     }
    // }
}
