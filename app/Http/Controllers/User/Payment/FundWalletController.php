<?php

namespace App\Http\Controllers\User\Payment;

use App\Constants\CurrencyConstants;
use App\Constants\NotificationConstants;
use App\Constants\TransactionConstants;
use App\Exceptions\Finance\UserTransactionException;
use App\Exceptions\Provider\ProviderUserTransactionException;
use App\Http\Controllers\Controller;
use App\Models\Provider;
use App\Services\Wallet\FundWalletService;
use App\Services\Finance\Wallet\WalletService;
use App\Services\Wallet\CurrencyService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class FundWalletController extends Controller
{
    public function fund(Request $request)
    {
        $data = $request->validate([
            "currency_type" => "required|exists:currencies,type",
            "with" => "required|string"
        ]);

        $fundWith = $data["with"];
        $currency = CurrencyService::getByType($data["currency_type"]);



        $user = auth()->user();

        if ($fundWith == CurrencyConstants::FUND_WITH_CARD) {

            if (!in_array($currency->type, [CurrencyConstants::DOLLAR_CURRENCY, CurrencyConstants::NAIRA_CURRENCY])) {
                return redirect()->back()->with(NotificationConstants::ERROR_MSG, "You can only fund with Dollar or Naira at this time");
            }

            // $gateways = CurrencyConstants::PAYMENT_GATEWAYS;
            // return view("dashboard.finance.wallet.fund.with_card", [
            //     "gateways" => $gateways,
            //     "currency" => $currency
            // ]);
        }

        // if ($fundWith == CurrencyConstants::FUND_WITH_BANK) {

        //     if (!in_array($currency->type, [CurrencyConstants::NAIRA_CURRENCY])) {
        //         return redirect()->back()->with(NotificationConstants::ERROR_MSG, "You can only fund Naira with Bank option at this time");
        //     }
        //     return view("dashboard.finance.wallet.fund.with_bank", [
        //         "currency" => $currency,
        //         "min_deposit" => 600,
        //         "payment_reference" => $user->username,
        //         "fee" => TransactionConstants::MANUAL_DEPOSIT_FIXED_FEE,
        //         "bank_details" => TransactionConstants::MANUAL_PAYMENT_BANKS
        //     ]);
        // }
    }

    // public function providerProcess(Request $request)
    // {
    //     try {
    //         $data = $request->validate([
    //             "provider_id" => "required|exists:providers,id",
    //             "amount" => "required|numeric|gt:0"
    //         ]);

    //         FundWalletService::byProvider($data["provider_id"], $data["amount"]);
    //         return redirect()->back()->with(NotificationConstants::SUCCESS_MSG, "Transaction completed successfully");
    //     } catch (ProviderUserTransactionException $e) {
    //         return redirect()->back()->with(NotificationConstants::ERROR_MSG, $e->getMessage());
    //     } catch (Exception $e) {
    //         return redirect()->back()->with(NotificationConstants::ERROR_MSG, "An error occured while processing your request.");
    //     }
    // }

    public function cardProcess(Request $request)
    {
// dd($request->all());
        try {
            $data = $request->validate([
                "gateway" => "required|" . Rule::in([CurrencyConstants::FLUTTERWAVE]),
                "currency_type" => "required|exists:currencies,type",
                "amount" => "required|numeric|gt:0"
            ]);

            // dd($data["currency_type"]);

            $initialization = FundWalletService::byGateway(
                $data["gateway"],
                $data["currency_type"],
                $data["amount"]
            );

            return redirect()->away($initialization["link"]);
        } catch (Exception $e) {
            return redirect()->back()->with(NotificationConstants::ERROR_MSG, "An error occured while processing your request.");
        }
    }

    // public function bankProcess(Request $request)
    // {
    //     try {
    //         FundWalletService::processBankPayment(auth()->id() , $request->all());
    //         return redirect()->route("auth.finance.wallets.index")
    //         ->with(NotificationConstants::SUCCESS_MSG, "Payment recorded successfully");
    //     } catch (ValidationException $e) {
    //        throw $e;
    //     } catch (UserTransactionException $e) {
    //         return redirect()->back()->with(NotificationConstants::ERROR_MSG, $e->getMessage());
    //     } catch (Exception $e) {
    //         throw $e;
    //         return redirect()->back()->with(NotificationConstants::ERROR_MSG, "An error occured while processing your request.");
    //     }
    // }
}
