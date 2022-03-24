<?php

namespace App\Http\Controllers\User;

use App\Constants\CurrencyConstants;
use App\Http\Controllers\Controller;
use App\Models\Subscription;
use App\Models\Wallet;
use App\Services\Wallet\WalletService;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    //
    public function index(){

        $gateways = CurrencyConstants::PAYMENT_GATEWAYS;
        $user = auth()->user();
        $wallet = Wallet::where('user_id', $user->id)->first();
        $sub = Subscription::where("user_id", $user->id)->first();
        // dd($sub->paid_on);
        return view('user.dashboard.wallet.index',[
            'wallet' => $wallet,
            'gateways' =>$gateways,
            'sub' => $sub
        ]);
    }
}
