<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrewVaccineRequest extends FormRequest
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
            'vaccine_id' => 'required|exists:vaccines,id',
            'immunization_date' => 'required',
        ];
    }

    public function attributes()
    {
        # code...
        return [
            'vaccine_id' => 'Vaccine',
            'immunization_date' => 'Immunization Date',
        ];
    }
}
