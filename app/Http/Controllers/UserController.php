<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;

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
        if ($this->create($request->all())) {
            return redirect()->route(ADMIN_MANAGER_USER);
        } else {
            return redirect()->back()->with('error-flash', 'Thêm thất bại.');
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

