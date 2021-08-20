<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrewChildrenBenificiaryRequest extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'relationship' => 'required',
            'gender' => 'required',
            'birth_date' => 'required',
        ];
    }

    public function attributes()
    {
        # code...
        return [
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'relationship' => 'Relationship',
            'gender' => 'Gender',
            'birth_date' => 'Birth Date',
        ];
    }
}
