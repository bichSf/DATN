<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    private $user;

    public function __construct(User $user ) {
        $this->user = $user;
    }
    /**
     * Show index
     *
     * @return mixed
     */
    public function index()
    {
        $listUser = $this->user->getAllUser();
        return view('admin.user.index', compact('listUser'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(UserRequest $request)
    {
        if ($this->user->createUser($request->all())) {
            Session::flash(STR_SUCCESS_FLASH, 'Thêm thành công.');
            return response()->json(['save' => true]);
        } else {
            Session::flash(STR_ERROR_FLASH, 'Thêm thất bại.');
            return response()->json(['save' => false]);
        }
    }

    public function edit($id)
    {
        $user = $this->user->find($id);
        abort_if(!$user, 404);
        return view('admin.user.edit', [
            'user' => $user
        ]);
    }

    public function update(UserRequest $request)
    {
        $this->user->updateUser($request->all());
    }

    public function destroy($id)
    {
        $user = $this->user->find($id);
        abort_if(empty($user), 404);
        $user && $user->delete() ? Session::flash(STR_SUCCESS_FLASH, 'Xoá thành công.') : Session::flash(STR_ERROR_FLASH, 'Xoá thất bại.');
        return redirect()->back();
    }
}

