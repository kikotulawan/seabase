<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrewEducationRequest extends FormRequest
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
            'course_degree' => 'required',
            'school_name' => 'required',
            'attendance_date' => 'required'
        ];
    }

    public function attributes()
    {
        # code...
        return [
            'course_degree' => 'Course/Degree',
            'school_name' => 'School Name',
            'attendance_date' => 'Attendance Date'
        ];
    }
}
