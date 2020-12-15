<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Show index
     *
     * @return mixed
     */
    public function index()
    {
        return view('admin.user.index');
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(UserRequest $request)
    {
        if (User::create($request->all())) {
            return redirect()->route(ADMIN_MANAGER_USER);
        } else {
            return redirect()->back()->with(STR_ERROR_FLASH, 'Thêm thất bại.');
        }
    }

    public function edit()
    {
    }

    public function update()
    {
    }

    public function destroy()
    {
    }
}

