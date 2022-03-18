<?php

namespace App\Http\Controllers\Admin\Currency;

use App\Constants\Media\FileConstants;
use App\Constants\NotificationConstants;
use App\Constants\StatusConstants;
use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Services\Media\FileService;
use Illuminate\Http\Request;

class CurrenciesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.dashboard.currency.index', [
            'currencies' => Currency::get()
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
        return view('admin.dashboard.currency.create', [
            'status' => StatusConstants::ACTIVE_OPTIONS,
        ]);
    }
    public function validateData($request)
    {
        return $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'short_name' => 'required|string',
            'status' => 'required|string',

        ]);
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
        // dd($request->all());
        $data = $this->validateData($request);
        $data["logo"] = putFileInPrivateStorage($data["logo"], 'currency/files');
        Currency::create($data);
        session()->flash(NotificationConstants::SUCCESS_MSG, "Currency added successfully");
        return redirect()->route('admin.currencies.index');
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
        $currency = Currency::findOrFail($id);
        return view('admin.dashboard.currency.edit',[
            'currency' => $currency,
            'status' => StatusConstants::ACTIVE_OPTIONS,
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
        $data = $this->validateData($request, $id);
        $currency = Currency::findOrFail($id);
        $oldLogo = null;
        if (!empty($logo = $data["logo"] ?? null)) {
            $data["logo"] = putFileInPrivateStorage($logo, 'currency/files');
            $oldLogo = $currency->logo;
        }
        $currency->update($data);
        deleteFileFromPrivateStorage($oldLogo);
        return redirect()->route("admin.currencies.index")
        ->with(NotificationConstants::SUCCESS_MSG , "Currency updated successfully!");
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
        $currency = Currency::where('id', $id)->findOrFail($id);
        if (!empty($file = $currency->logo)) {
            FileService::cleanDelete($file, true);
        }
        $currency->destroy($id);
        session()->flash(NotificationConstants::ERROR_MSG, ' Currency Removed!');
        return back();
    }
}
