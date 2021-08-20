<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrincipalRequest extends FormRequest
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
            'code' => 'required|unique:principals,code,' .$this->id,
            'principal' => 'required|unique:principals,principal,' .$this->id,
            'accreditation_number' => 'required',
            'issue_date' => 'required|date',
            'expiry_date' => 'required|date',
            'license_expiry_date' => 'required|date',
            'email' => 'required|email:rfc|unique:principals,email,' .$this->id,
            'country_id' => 'required|exists:countries,id',
            'image_path' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }

    public function attributes()
    {
        return [
            'code' => 'Code',
            'principal' => 'Principal Name',
            'accreditation_number' => 'Accreditation No.',
            'issue_date' => 'Issue Date',
            'expiry_date' => 'Expiry Date',
            'license_expiry_date' => 'License Expiry Date',
            'email' => 'Email Address',
            'country_id' => 'Country',
            //'image_path' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }
}
