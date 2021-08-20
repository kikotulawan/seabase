<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrewLicenceRequest extends FormRequest
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

            'license_id' => 'required|exists:licenses,id',
            'license_number' => 'required',
            'issue_date' => 'required',
        ];
    }

    public function attributes()
    {
        # code...
        return [
            'license_id' => 'License',
            'license_number' => 'License Number',
            'issue_date' => 'Issue Date'
        ];
    }
}
