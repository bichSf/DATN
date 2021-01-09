<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
    public function rules()
    {
        return [
            'old_password' => ['required'],
            'password' => ['required', 'min:8', 'max:12'],
            'password_confirm' => ['required', 'same:password']
        ];
    }

    /**
     * define message validation
     *
     * @return array|string[]
     */
    public function messages()
    {
        return [
            'required' => 'Trường này không được để trống',
            'password.min'   => 'Password cần từ 8 - 12 kí tự.',
            'password.max'   => 'Password cần từ 8 - 12 kí tự.',
            'password_confirm.same'   => 'Không trùng với password mới nhập.',
        ];
    }
}
