<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function contact(){
        return view("contact");
    }

    public function how_it_works(){
        return view("how_it_works");
    }

    public function index(){
        return view("index");
    }

    public function about(){
        return view("about");
    }

    public function blog(){
        return view("blog");
    }
}
