<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DataRequest extends FormRequest
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
        $data = $this->request->all();
        $rules = $this->getRuleDataRequest($data['table_type']);
        return $rules;
    }

    /**
     * Message Response Validation user store
     *
     * @return array
     */
    public function messages()
    {
        return [
            'weight.between' => 'Số liệu không hợp lệ',
            'height.between' => 'Số liệu không hợp lệ',
            'head_circumference.between' => 'Số liệu không hợp lệ',
            'arm_circumference.between' => 'Số liệu không hợp lệ',
            'biceps_skinfold.between' => 'Số liệu không hợp lệ',
            'chest_circumference.between' => 'Số liệu không hợp lệ',
            'fat_percentage.between' => 'Số liệu không hợp lệ',
            'knee_height.between' => 'Số liệu không hợp lệ',
            'stomach_feet.between' => 'Số liệu không hợp lệ',
        ];
    }

    /**
     * @param $type
     * @return array
     */
    public function getRuleDataRequest($type)
    {
        $listAttr = ATTRIBUTE_DATA[$type];
        $rules = [];
        foreach ($listAttr as $item) {
            $rules[$item] = ['bail', 'numeric', 'between: 1,1000'];
        }
        return $rules;
    }
}
