<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalaryScaleRequest extends FormRequest
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
            'salary_name' => 'required|unique:salary_scales,salary_name,' .$this->id,
        ];
    }

    public function attributes()
    {
        return [
            'salary_name' => 'Salary Name'
        ];
    }
}
