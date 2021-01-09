<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
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
    public function index(Request $request)
    {
        $params = $request->all();
        $listUser = $this->user->getAllUser($params);
        return view('admin.user.index', [
            'params' => $params,
            'listUser' => $listUser
        ]);
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

    public function update(UserRequest $request, $id)
    {
        abort_if(!$this->user->find($id), 404);
        if ($this->user->updateUser($id, $request->all())) {
            Session::flash(STR_SUCCESS_FLASH, 'Chỉnh sửa thành công.');
            return response()->json(['save' => true]);
        } else {
            Session::flash(STR_ERROR_FLASH, 'Chỉnh sửa thất bại.');
            return response()->json(['save' => false]);
        }
    }

    public function destroy($id)
    {
        $user = $this->user->find($id);
        abort_if(empty($user), 404);
        $user && $user->delete() ? Session::flash(STR_SUCCESS_FLASH, 'Xoá thành công.') : Session::flash(STR_ERROR_FLASH, 'Xoá thất bại.');
        return redirect()->back();
    }
}

