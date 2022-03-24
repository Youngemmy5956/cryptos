<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Media\FileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = auth()->user();
        return view('user.dashboard.myaccount.index', [
            'user' => $user
        ]);
    }

    public function validateData(Request $request)
    {
        return $request->validate([
            "first_name" => "required|string",
            "last_name" => "required|string",
            "picture" => "nullable|image",
            "password" => "nullable|string",
            "email" => "required|email",
            "phone" => "required|string",
        ]);
    }
    public function update(Request $request)
    {
        //

        $data = $this->validateData($request);

        $user = auth()->user();
        if (!empty($file = $data["picture"] ?? null)) {

            $fileService = new FileService;
            $picture = $fileService->setMoveFile(true)->saveFromFile($file, "user/profile_pics");
            unset($data["picture"]);
            $data["picture_id"] = $picture->id;
        }
        $user->update($data);
        session()->flash("success_message", "Account updated successfully");
        return back();
    }

    public function changePassword(Request $request)
    {
        // dd(request()->all());
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:6',
            'confirm_password' => 'required|same:new_password'
        ]);

        $currentuser = auth()->user();
        if (Hash::check($request->current_password, $currentuser->password)) {

            $currentuser->update([
                'password' => bcrypt($request->new_password)
            ]);
            session()->flash("password_success", "Password changed successfuly");
            return back();
        } else {
            session()->flash("password_error", "old password does not match");
            return back();
        }
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
