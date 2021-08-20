<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrainingCenterRequest extends FormRequest
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
            'code' => 'required|unique:training_centers,code,' .$this->id,
            'center' => 'required|unique:training_centers,center,' .$this->id
        ];
    }
    public function attributes()
    {
        return [
            'code' => 'Code',
            'center' => 'Training Center',
            'address' => 'Address',
            'telephone' => 'Telephone No.',
            'contact_person' => 'Contact Person',
            'remarks' => 'Remarks',
        ];
    }
}
