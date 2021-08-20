<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgencyEditRequest extends FormRequest
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
            'agency' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'code' => 'Code',
            'agency' => 'Agency Name',
            'telephone' => 'Telephone No.',
            'contact_person' => 'Contact Person',
            'address' => 'Address',
        ];
    }
}
