<?php

namespace App\Http\Controllers\Admin\Packages;

use App\Constants\NotificationConstants;
use App\Constants\StatusConstants;
use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Models\Plan;
use App\Services\Media\FileService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return view('admin.dashboard.plans.index', [
            'plans' => Plan::get(),
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
        return view('admin.dashboard.plans.create', [
            'status' => StatusConstants::ACTIVE_OPTIONS,
            'currencies' => Currency::get()
        ]);
    }
    public function validateData($request)
    {
        return $request->validate([
            'currency_id' => 'required|exists:currencies,id',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|string',
            'duration' => 'nullable|string',
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
        // dd($request->all());
        //
        try{
        $data = $this->validateData($request);
        if (!empty($file = $data["logo"] ?? null)) {
            $fileService = new FileService;
            $logo = $fileService->setMoveFile(true)->saveFromFile($file, 'plans/files');
            unset($data["logo"]);
            $data["logo_id"] = $logo->id;
        }
        Plan::create($data);
        session()->flash(NotificationConstants::SUCCESS_MSG, "Plan added successfully");
        return redirect()->route('admin.plans.index');
    } catch (ValidationException $e) {
        return redirect()->back()->with('error_message', $e->getMessage());
    } catch (Exception $e) {
        return redirect()->back()->with('error_message', "An error occured while processing your request.");
    }
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
        $plans = Plan::findOrfail($id);
        return view('admin.dashboard.plans.edit',[
            'plans' => $plans,
            'currencies' => Currency::get(),
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
        $data = $this->validateData($request);
        $plan = Plan::findOrFail($id);
        if (!empty($file = $data["logo"] ?? null)) {
            $fileService = new FileService;
            $logo = $fileService->setMoveFile(true)->saveFromFile($file, 'plans/files');
            unset($data["logo"]);
            $data["logo_id"] = $logo->id;
        }
        $plan->update($data);
        session()->flash(NotificationConstants::SUCCESS_MSG, "Plan updated successfully!");
        return redirect()->route('admin.plans.index');
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
        $plan = Plan::findOrfail($id);
        if(!empty($file = $plan->logo_id)){
            FileService::cleanDelete($file , true);
        }
        $plan->delete($id);
        session()->flash(NotificationConstants::ERROR_MSG, 'Plan Removed!');
        return back();
    }
}
