<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmbarkationRequest extends FormRequest
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
            'vessel_id' => 'required|exists:vessels,id',
            'departure_id' => 'required|exists:airports,id',
            'departure_date' => 'required',
            'embarkation_id' => 'required|exists:seaports,id',
            'embarkation_date' => 'required',
            'disembarkation_date' => 'required',
            'contract_duration' => 'required|numeric',
            'point_of_hire' => 'required',
            'status_id' => 'required|exists:statuses,id',
            'crews' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'vessel_id' => 'Vessel',
            'departure_id' => 'Departure Airport',
            'departure_date' => 'Departure Date',
            'embarkation_id' => 'Port of Embarkation',
            'embarkation_date' => 'Embarkation Date',
            'disembarkation_date' => 'Disembarkation Date',
            'contract_duration' => 'Contract Duration',
            'point_of_hire' => 'Point of Hire',
            'status_id' => 'Status',

        ];
    }
    public function messages()
{
    return [

        'crews.required' => 'Please select a crew to embark',
    ];
}
}
