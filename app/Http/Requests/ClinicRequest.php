<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClinicRequest extends FormRequest
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
            'clinic' => 'required|unique:clinics,clinic,' .$this->id
        ];
    }

    public function attributes()
    {
        return [
            'clinic' => 'Clinic Name',
            'address' => 'Address',
            'telephone' => 'Telephone No.',
            'contact_person' => 'Contact Person',
            'remarks' => 'Remarks',
        ];
    }
}
