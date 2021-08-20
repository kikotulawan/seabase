<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicalCertificateRequest extends FormRequest
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
            'medicalcertificate' => 'required|unique:medical_certificates,medicalcertificate,' .$this->id,
            'notifydays' => 'required|numeric'
        ];
    }

    public function attributes()
    {
        return [
            'medicalcertificate' => 'Medical Certificate',
            'notifydays' => 'Days to Notify'
        ];
    }
}
