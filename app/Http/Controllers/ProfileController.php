<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    private $user;

    public function __construct(User $user ) {
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.profiles.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UserRequest $request)
    {
        if ($this->user->updateUser(Auth::user()->id, $request->all())) {
            Session::flash(STR_SUCCESS_FLASH, 'Chỉnh sửa thành công.');
            return response()->json(['save' => true]);
        } else {
            Session::flash(STR_ERROR_FLASH, 'Chỉnh sửa thất bại.');
            return response()->json(['save' => false]);
        }
    }
}
