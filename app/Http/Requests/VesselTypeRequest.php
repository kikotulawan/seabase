<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VesselTypeRequest extends FormRequest
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
            'vessel_type' => 'required|unique:vessel_types,vessel_type,' .$this->id ,
            'code' => 'required|unique:vessel_types,code,' .$this->id
        ];
    }

    public function attributes()
    {
        return [
            'vessel_type' => 'Vessel Type' ,
            'code' => 'Vessel Code' 
        ];
    }
}
