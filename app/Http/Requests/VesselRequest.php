<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VesselRequest extends FormRequest
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
            'vessel_name' => 'required|unique:vessels,vessel_name,' .$this->id ,
            'code' => 'required|unique:vessels,code,' .$this->id,
            'call_sign' => 'required|unique:vessels,call_sign,' .$this->id,
            'flag_id' => 'required|exists:flag_state_documents,id',
            'vessel_type_id' => 'required|exists:vessel_types,id',
            'principal_id' => 'required|exists:principals,id',
        ];
    }

    public function attributes()
    {
        return [
            'vessel_name' => 'Vessel Name' ,
            'code' => 'Vessel Code' ,
            'call_sign' => 'Call Sign',
            'flag_id' => 'Flag Carrier',
            'vessel_type_id' => 'Vessel Type',
            'principal_id' => 'Principal',
        ];
    }
}
