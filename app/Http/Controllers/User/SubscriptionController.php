<?php

namespace App\Http\Controllers\User;

use App\Constants\NotificationConstants;
use App\Constants\StatusConstants;
use App\Exceptions\PlanException;
use App\Exceptions\SubscriptionException;
use App\Exceptions\Wallet\WalletException;
use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\Subscription;
use App\Services\Plan\SubscriptionService;
use App\Services\Wallet\UserTransactionService;
use App\Services\Wallet\WalletService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SubscriptionController extends Controller
{
    //
    public function index()
    {
        return view('user.dashboard.finance.subscription', [
            'plans' => Plan::get()
        ]);
    }

    public function subscribe($id)
    {
        try {
            $user_id = auth()->id();
            SubscriptionService::subscribeFromWallet($user_id, $id);

            return redirect()->back()->with(NotificationConstants::SUCCESS_MSG, "Subscription completed successfully");
        } catch (ValidationException $e) {
            throw $e;
        } catch (WalletException $e) {
            return redirect()->back()->with(NotificationConstants::ERROR_MSG, $e->getMessage());
        } catch (PlanException $e) {
            return redirect()->back()->with(NotificationConstants::ERROR_MSG, $e->getMessage());
        } catch (SubscriptionException $e) {
            return redirect()->back()->with(NotificationConstants::ERROR_MSG, $e->getMessage());
        } catch (Exception $e) {
            throw $e;
            return redirect()->back()->with(NotificationConstants::ERROR_MSG, "An error occured while processing your request.");
        }
    }
   
}
