<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
Route::get("/contact", [HomeController::class, "contact"])->name("contact");
Route::get("/how_it_works", [HomeController::class, "how_it_works"])->name("how_it_works");
Route::get("/blog", [HomeController::class, "blog"])->name("blog");
Route::get("/about", [HomeController::class, "about"])->name("about");
Auth::routes();
