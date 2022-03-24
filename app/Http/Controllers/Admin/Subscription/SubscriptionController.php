<?php

namespace App\Http\Controllers\Admin\Subscription;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use App\Constants\CurrencyConstants;
use App\Constants\NotificationConstants;
use App\Constants\StatusConstants;
use App\Models\Currency;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.dashboard.subscription.index', [
            'subscriptions' => Subscription::get()
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

        return view('admin.dashboard.subscription.create', [
            'users' => User::get(),
            'plans' => Plan::get(),
            'currencies' => Currency::get(),
            'statuses' => StatusConstants::ACTIVE_OPTIONS
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function validateData($request)
    {
        return $request->validate([
            'currency_id' => 'required|exists:currencies,id',
            'user_id' => 'required|exists:users,id',
            'plan_id' => 'required|exists:plans,id',
            'price' => 'required|string',
            'paid_on' => 'required|date|after_or_equal:date',
            'expires_at' => 'required|date|after:paid_on',
            'status' => 'required|string',
        ]);
    }
    public function store(Request $request)
    {
        //
        // dd($request->all());
        $data = $this->validateData($request);
        Subscription::create($data);
        session()->flash(NotificationConstants::SUCCESS_MSG, 'Sub added successfully');
        return redirect()->route('admin.subscriptions.index');
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
        $sub = Subscription::findOrFail($id);
        return view('admin.dashboard.subscription.edit', [
            'users' => User::get(),
            'plans' => Plan::get(),
            'sub' => $sub,
            'currencies' => Currency::get(),
            'statuses' => StatusConstants::ACTIVE_OPTIONS
        ]);
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
        $sub = Subscription::findOrFail($id);
        $data = $this->validateData($request);
        $sub->update($data);
        session()->flash(NotificationConstants::SUCCESS_MSG, 'Sub updated successfully');
        return redirect()->route('admin.subscriptions.index');
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
        $sub = Subscription::where('id', $id)->findOrFail($id);
        $sub->destroy($id);
        session()->flash(NotificationConstants::ERROR_MSG, 'Sub removed successfully');
        toastr()->error("Subscription has been removed");
        return redirect()->route('admin.subscriptions.index');
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        Subscription::whereIn('id',explode(",",$ids))->delete();
        toastr()->error("Transactions has been deleted");
        return response()->json(['success'=>"Are you sure you want to delete this transaction."]);

    }
}
