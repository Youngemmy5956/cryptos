<?php

namespace App\Http\Controllers\User\Payment;

use App\Constants\CurrencyConstants;
use App\Constants\NotificationConstants;
use App\Constants\StatusConstants;
use App\Constants\TransactionActivityConstants;
use App\Constants\TransactionConstants;
use App\Http\Controllers\Controller;
use App\Services\PayementGateways\FlutterwaveService;
use Illuminate\Http\Request;
use App\Service\Wallet\FundWalletService;
use App\Services\Wallet\FundWalletService as WalletFundWalletService;
use App\Services\Wallet\UserTransactionService;

class PaymentGatewayController extends Controller
{
    public function handleCallback(Request $request, $gateway)
    {
        if ($gateway == CurrencyConstants::FLUTTERWAVE) {
            return $this->handleFlutterwaveCallback($request);
        }
    }
    public function handleFlutterwaveCallback(Request $request)
    {
        $flutterwaveService = new FlutterwaveService;

        if ($request->status == "cancelled") {
            UserTransactionService::markAs($request->tx_ref, StatusConstants::CANCELLED);
            return redirect()->route("user.wallets.index")
                ->with(NotificationConstants::ERROR_MSG, "Transaction cancelled!");
        }



        $response = $flutterwaveService->verify($request->transaction_id);
        $data = $response["data"];
        if ($response["status"] == "success") {
            $transaction = UserTransactionService::getByReference($data["tx_ref"]);
            if ($transaction->activity == TransactionActivityConstants::FUND_WITH_FLUTTERWAVE) {
                $processData = WalletFundWalletService::processGatewayCallback($transaction);
                return redirect($processData["link"])
                    ->with($processData["success"] ? NotificationConstants::SUCCESS_MSG :
                        NotificationConstants::ERROR_MSG, $processData["message"]);
            }
        }


        return redirect()->route("wallets.index")
            ->with(NotificationConstants::SUCCESS_MSG, "Transaction completed successfully!");
    }
}
