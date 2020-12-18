<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;

class UserController extends Controller
{
    private $user;

    public function __construct(
        User $user
    )
    {
        $this->user = $user;
    }
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
        if ($this->user->createUser($request->all())) {
            return redirect()->route(ADMIN_MANAGER_USER);
        } else {
            return redirect()->back()->with(STR_ERROR_FLASH, 'Thêm thất bại.');
        }
    }

    public function edit()
    {
    }

    public function update(UserRequest $request)
    {
        $this->user->updateUser($request->all());
    }

    public function destroy()
    {
    }
}

