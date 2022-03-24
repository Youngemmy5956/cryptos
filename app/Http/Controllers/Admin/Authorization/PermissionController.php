<?php

namespace App\Http\Controllers\Admin\Authorization;

use App\Constants\AppConstants;
use App\Helpers\Constants;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::latest()->paginate(50);
        $guards = AppConstants::PERMISSION_GUARDS;
        $sn = $permissions->firstItem();
        return view("admin.authorization.permissions.index" , [
            "permissions" => $permissions,
            "sn" => $sn,
            "guards" => $guards
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
        $data = $request->validate([
            "name" => "required|string|unique:permissions,name",
            "guard_name" => "required|string|in:web,plan"
        ]);
        $data["name"] = str_replace(" " , "_" , $data["name"]);
        Permission::create($data);
        return back()->with("success_message", "Permission created successfully!");
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
        $data = $request->validate([
            "name" => "required|string|unique:permissions,name,$id",
            "guard_name" => "required|string|in:web,plan"
        ]);
        $data["name"] = str_replace(" " , "_" , $data["name"]);
        Permission::findorfail($id)->update($data);
        return back()->with("success_message", "Permission updated successfully!");
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
}
