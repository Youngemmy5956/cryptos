<?php

use App\Http\Controllers\Admin\Authorization\PermissionController;
use App\Http\Controllers\Admin\Authorization\RoleController;
use App\Http\Controllers\Admin\Currency\CurrenciesController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Dashboard\FastestFinger\FastestFingerActivityController;
use App\Http\Controllers\Dashboard\Finance\WalletController;
use App\Http\Controllers\Admin\Users\UsersController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\Messaging\MessageController;
use App\Http\Controllers\Admin\Messaging\RecipientController;
use App\Http\Controllers\Admin\Packages\PlanController;
use App\Http\Controllers\Admin\Finance\TransactionController;
use App\Http\Controllers\Admin\Subscription\SubscriptionController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\Dashboard\Account\ReferralController;
use App\Http\Controllers\User\Payment\PaymentGatewayController;
use App\Http\Controllers\Dashboard\Account\AccountController;
use App\Http\Controllers\Web\FaqsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\Ad\AdController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\Payment\FundWalletController;
use App\Http\Controllers\User\UserController as UserAccountController;
use App\Http\Controllers\Web\Plan\PlanController as PlanPlanController;

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



Route::as("web.")->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::resource('plans', PlanPlanController::class)->only('show');
    Route::get('/read-file/{path}', [HomeController::class, "readFile"])->name("read_file");
    // Route::get('/ref-invite/{ref_code}', [RegisterController::class, "ref_invite"])->name("ref_invite");
});
Auth::routes();

Route::as("auth.")->middleware("auth")->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::prefix("payment")->as("payment.")->group(function () {
        Route::get("gateway/{gateway}/callback", [PaymentGatewayController::class, 'handleCallback'])->name("callback");
    });

    Route::post('fund/card/process', [FundWalletController::class, 'cardProcess'])->name("fund.card.process");

    // Route::prefix("payment")->as("payment.")->group(function () {
        Route::get("gateway/{gateway}/callback", [PaymentGatewayController::class, 'handleCallback'])->name("callback");
    // });
    // // Route::prefix("payment")->as("payment.")->group(function () {
    //     Route::get("gateway/{gateway}/callback", [PaymentGatewayController::class, 'handleCallback'])->name("callback");
    // });

    // Route::prefix("finance")->as("finance.")->group(function () {

    //     Route::prefix("wallets")->as("wallets.")->group(function () {
    //         Route::get('/', [WalletController::class, 'index'])->name("index");
    //         // Fund
    //         Route::get('fund', [FundWalletController::class, 'fund'])->name("fund");
    //         Route::post('fund/provider/process', [FundWalletController::class, 'providerProcess'])->name("fund.provider.process");
    //         Route::post('fund/card/process', [FundWalletController::class, 'cardProcess'])->name("fund.card.process");
    //         Route::post('fund/bank/process', [FundWalletController::class, 'bankProcess'])->name("fund.bank.process");
    //     });

    //     Route::resource('transactions', TransactionController::class)->only("index");
    // });

    // Route::prefix("account")->as("account.")->group(function () {
    //     Route::post('find', [AccountController::class, 'find'])->name("find");
    //     Route::get('changepassword', [ChangePasswordController::class, 'index'])->name("ch");
    //     Route::POST('change-password', [ChangePasswordController::class, 'store'])->name('change_password');
    //     Route::match(['get', 'post'], 'account', [UserAccountController::class, 'account'])->name('account');
    //     Route::get('/referrals', [ReferralController::class, 'index'])->name('referrals');
    // });
});
Route::as("user.")->prefix("user")->middleware("auth")->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'home'])->name('home');
    Route::get('/myaccount', [UserAccountController::class, "index"])->name("myaccount.index");
    Route::post('/chamge-password', [UserAccountController::class, "changePassword"])->name("myaccount.change_password");
    Route::patch('/myaccount', [UserAccountController::class, "update"])->name("myaccount.update");
    Route::get('/transactions', [\App\Http\Controllers\User\TransactionController::class, 'index'])->name('transactions.index');
    Route::post('/deduct/{wallet}', [\App\Http\Controllers\User\SubscriptionController::class, 'subscribe'])->name('subscriptions.deductions');
    Route::get('/subscribe', [\App\Http\Controllers\User\SubscriptionController::class, 'index'])->name('subscriptions.index');
    Route::get('/mywallet', [\App\Http\Controllers\User\WalletController::class, 'index'])->name('wallets.index');

});


Route::as("admin.")->prefix("admin")->middleware(["role:Admin|Sudo", "auth"])->group(function () {
    Route::get('/home', [AdminDashboardController::class, 'index'])->name('home');

    Route::get('users/imitate/{id}', [UsersController::class, "imitate"])->name("users.imitate");
    Route::resource('/users', UsersController::class);
    Route::delete('transactions-delete', [TransactionController::class, "deleteAll"])->name("transactions.delete-all");
    Route::resource('transactions', TransactionController::class)->only("index", "destroy");
    Route::post('transaction/status/{id}/change_-status', [TransactionController::class, "status"])->name("transactions.change_status");
    Route::resource('plans', PlanController::class);
    Route::resource('currencies', CurrenciesController::class);
    Route::delete('subscriptions-delete', [SubscriptionController::class, "deleteAll"])->name("subscriptions.delete");
    Route::resource('subscriptions', SubscriptionController::class);

    // Route::resource('/faqs', FaqController::class);

    // Route::prefix("authorization")->as("authorization.")->middleware(["role:Sudo"])->group(function () {
    //     Route::resource('roles', RoleController::class);
    //     Route::post('roles/{id}/update-permissions', [RoleController::class, "update_permissions"])->name("roles.update_permissions");
    //     Route::resource('permissions', PermissionController::class);
    // });

    // Route::prefix("messaging")->as("messaging.")->group(function () {
    //     Route::resource('messages', MessageController::class);
    //     Route::resource('recipients', RecipientController::class);
    // });
});
