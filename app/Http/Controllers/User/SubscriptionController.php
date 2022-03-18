<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    //
    public function index(){
        return view('user.dashboard.finance.subscription',[
            'plans' => Plan::get()
        ]);
    }
}
