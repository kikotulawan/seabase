<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrincipalContactRequest extends FormRequest
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
            'name' => 'required|unique:principal_contacts,name,' .$this->id,
            'contact_number' => 'required',
            'email_address' => 'required|email:rfc|unique:principal_contacts,email_address,' .$this->id,
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Name',
            'contact_number' => 'Contact Number',
            'email_address' => 'Email Address'
        ];
    }
}
