<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use App\Models\User;
use App\Models\UserTransaction;
use App\Services\Auth\AuthorizationService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(){
        // if (AuthorizationService::checkForRoles(["Admin", "Sudo"])) {
        //     return redirect()->route("admin.home");
        // }
        $users = User::latest()->take(10)->get();
        $countUsers = User::count();
        $countSub = Subscription::count();
        $transactions = UserTransaction::latest()->take(10)->get();
        $income = UserTransaction::pluck("amount")->sum();
        return view('admin.dashboard.home',[
            "users" => $users,
            "transactions" => $transactions,
            "countUsers" => $countUsers,
            "countSub" => $countSub,
            "income" => $income
        ]);
    }
}
