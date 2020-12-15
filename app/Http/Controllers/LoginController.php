<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Show form login
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        if (!Auth::check()) {
            return view('auth.login');
        }
        return redirect(route(ADMIN_MANAGER_USER));
    }


    /**
     * function handle login
     *
     * @param LoginRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function login(LoginRequest $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return redirect(route(ADMIN_MANAGER_USER));
        }
        return redirect(route(USER_LOGIN))->withInput($request->input())->with(STR_ERROR_FLASH, 'Email hoặc mật khẩu không trùng khớp.');
    }
}
