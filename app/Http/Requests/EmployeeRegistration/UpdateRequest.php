<?php

namespace App\Http\Requests\EmployeeRegistration;

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
            'join_date' => 'nullable',
            'designation_id' => 'required',
            'salary' => 'nullable',
            'image' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'dob.required' => 'The date of birth field is required',
            'join_date.required' => 'The join date field is required',
            'designation_id.required' => 'The designation field is required',
        ];
    }
}
