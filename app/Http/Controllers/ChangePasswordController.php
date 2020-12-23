<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Models\Survey;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ChangePasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.passwords.reset');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ChangePasswordRequest $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function update(ChangePasswordRequest $request)
    {
        $auth = Auth::user();
        if(Hash::check($request->old_password, $auth->password)) {
            if(User::where('id', $auth->id)->update(['password' => Hash::make($request->password)])) {
                Session::flash(STR_SUCCESS_FLASH, 'Thay đổi mật khẩu thành công.');
                return response()->json(['save' => true]);
            } else {
                Session::flash(STR_ERROR_FLASH, 'Thay đổi mật khẩu thất bại.');
                return response()->json(['save' => false]);
            }
        }
        return response()->json(['passwordFail' => true]);
    }
}
