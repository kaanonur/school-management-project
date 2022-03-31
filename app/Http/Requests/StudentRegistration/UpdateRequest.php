<?php

namespace App\Http\Requests\StudentRegistration;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'father_name' => 'required',
            'mother_name' => 'required',
            'mobile' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'discount' => 'required',
            'year_id' => 'required',
            'class_id' => 'required',
            'group_id' => 'required',
            'shift_id' => 'required',
            'image' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'dob.required' => 'The date of birth field is required',
            'year_id.required' => 'The year field is required',
            'class_id.required' => 'The class field is required',
            'group_id.required' => 'The group field is required',
            'shift_id.required' => 'The shift field is required',
        ];
    }
}
