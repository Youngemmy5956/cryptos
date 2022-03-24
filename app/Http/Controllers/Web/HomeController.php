<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        return view("web.home.index",[
            'plans' => Plan::get()
        ]);
    }


    public function readFile($path)
    {
        $path = readFileUrl("decrypt", $path);
        return getFileFromPrivateStorage($path);
    }
}
