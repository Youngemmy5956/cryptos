<?php

namespace App\Http\Controllers\Admin\Authorization;

use App\Constants\AppConstants;
use App\Http\Controllers\Controller;
use App\Services\Auth\AuthorizationService;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::paginate(50);
        $sn = $roles->firstItem();
        return view("admin.authorization.roles.index" , [
            "roles" => $roles,
            "sn" => $sn 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
            "name" => "required|string|unique:roles,name"
        ]);
        $data["name"] = str_replace(" " , "_" , $data["name"]);
        Role::create($data);
        AuthorizationService::syncSudoRoles();
        return back()->with("success_message", "Role created successfully!");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::findById($id);
        $permissions = Permission::whereNotIn("guard_name" , [AppConstants::PLAN_GUARD])->get();
        $sn = 1;
        return view("admin.authorization.roles.permissions" , [
            "role" => $role,
            "permissions" => $permissions,
            "sn" => $sn
        ]);
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
            "name" => "required|string|unique:roles,name,$id"
        ]);
        $data["name"] = str_replace(" " , "_" , $data["name"]);
        Role::findorfail($id)->update($data);
        AuthorizationService::syncSudoRoles();
        return back()->with("success_message", "Role updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::findorfail($id)->delete();
        return back()->with("success_message", "Role deleted successfully!");
    }

    public function update_permissions (Request $request , $id)
    {
        $role = Role::findById($id);
        $checkedPermissionIds = $request->checked_permissions;
        $permissions = Permission::whereIn("id" , $checkedPermissionIds)->get();
        $role->syncPermissions($permissions);
        return back()->with("success_message", "Role permissions updated successfully!");
    }


}
