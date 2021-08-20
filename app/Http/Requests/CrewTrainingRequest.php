<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrewTrainingRequest extends FormRequest
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
            'training_course_id' => 'required|exists:training_courses,id',
            'training_center_id' => 'required|exists:training_centers,id',
            'certificate_number' => 'required',
            'issue_date' => 'required',
        ];
    }

    public function attributes()
    {
        # code...
        return [
            'training_center_id' => 'Training Center',
            'training_course_id' => 'Training Course',
            'certificate_number' => 'Certificate Number',
            'issue_date' => 'Issue Date'
        ];
    }
}
