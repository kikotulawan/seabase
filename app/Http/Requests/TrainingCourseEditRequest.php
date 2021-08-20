<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrainingCourseEditRequest extends FormRequest
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
            'code' => 'required',
            'course' => 'required',
            'notifydays' => 'required|numeric',
        ];
    }

    public function attributes()
    {
        return [
            'code' => 'Code',
            'course' => 'Training Course',
            'notifydays' => 'Days to Notify'
        ];
    }
}
