<?php

namespace App\Http\Controllers\Admin\Finance;

use App\Constants\NotificationConstants;
use App\Constants\StatusConstants;
use App\Http\Controllers\Controller;
use App\Models\UserTransaction;
use App\Services\Auth\AuthorizationService;
use App\Services\Wallet\UserTransactionService;
use App\Services\Wallet\UserTransactionStatusService;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $builder = UserTransaction::test();
        $transactions = UserTransaction::paginate(30);
        return view('admin.dashboard.finance.transaction.index',[
            'transactions' =>$transactions,
            'statuses' => StatusConstants::TRANSACTION_OPTIONS
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //
    public function status(Request $request)
    {
        // AuthorizationService::hasPermissionTo(["can_edit_transactions"]);
        $status = $request->status;
        $transaction = UserTransactionService::getById($request->id);

        // if (!in_array($transaction->activity, [TransactionActivityConstants::FUND_WITH_BANK])) {
        //     return back()->with(NotificationConstants::ERROR_MSG, "You can only modify transactions for Bank Deposits!");
        // }

        if (in_array($transaction->status, [StatusConstants::COMPLETED , StatusConstants::DECLINED])) {
            return back()->with(NotificationConstants::ERROR_MSG, "You cannot modify a completed or declined request!");
        }

        if (!in_array($status, [StatusConstants::COMPLETED , StatusConstants::DECLINED])) {
            return back()->with(NotificationConstants::ERROR_MSG, "Allowed status is Completed or Declined!");
        }

        UserTransactionStatusService::update($transaction , $request->all());

        return back()->with(NotificationConstants::SUCCESS_MSG, "Status updated successfully!");
    }
}


