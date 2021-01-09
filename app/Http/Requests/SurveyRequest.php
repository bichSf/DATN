<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SurveyRequest extends FormRequest
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
            'name' => 'required',
            'area_id' => 'required',
            'month' => 'required',
            'year' => 'required',
        ];
    }

    /**
     * Message Response Validation user store
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => 'Trường này không được để trống',
        ];
    }
}