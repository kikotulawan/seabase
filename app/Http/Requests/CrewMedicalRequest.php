<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrewMedicalRequest extends FormRequest
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
            'medical_certificate_id' => 'required|exists:medical_certificates,id',
            'clinic_id' => 'required|exists:clinics,id',
            'certificate_number' => 'required',
            'issue_date' => 'required',
        ];
    }

    public function attributes()
    {
        # code...
        return [
            'medical_certificate_id' => 'Medical Certificate',
            'clinic_id' => 'Medical Clinic',
            'certificate_number' => 'Certificate Number',
            'issue_date' => 'Issue Date'
        ];
    }
}
