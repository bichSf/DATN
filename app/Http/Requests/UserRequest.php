<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        $role = [
            'name' => 'required',
            'gender' => 'required',
            'birthday' => 'required',
            'email' => ['required', 'unique:users,email,'.$request->id],
            'phone' => ['required', 'unique:users,phone'.$request->id],
        ];
        if ($request->id) {
            $role['password'] = ['nullable', 'min:8', 'max:12'];
            $role['password_confirm'] = ['nullable', 'same:password'];
        } else {
            $role['password'] = ['required', 'min:8', 'max:12'];
            $role['password_confirm'] = ['required', 'same:password'];
        }
        return $role;
    }

    public function messages()
    {
        return [
            "required" => "Trường này không được để trống",
            "email.unique" => "Email này đã tồn tại.",
            "phone.unique" => "Số điện thoại này đã tồn tại.",
            "password_confirm.same" => "Không trùng với password mới nhập.",
            'password.min'   => 'Password cần từ 8 - 12 kí tự.',
            'password.max'   => 'Password cần từ 8 - 12 kí tự.',
        ];
    }
}
