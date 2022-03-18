<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Auth\AuthorizationService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(){
        // if (AuthorizationService::checkForRoles(["Admin", "Sudo"])) {
        //     return redirect()->route("admin.home");
        // }
        return view('admin.dashboard.home');
    }
}
