<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function home()
    {
        $user = auth()->user();
        $sub = Subscription::with("plan")->where("user_id", $user->id)->first();
        return view('user.dashboard.home',['user'=> $user, 'sub'=> $sub]);
    }
}
