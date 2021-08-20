<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrewIncidentRequest extends FormRequest
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
            'incident_rank_id' => 'required|exists:ranks,id',
            'incident_date' => 'required',
            'repatriation_date' => 'required',
            'description' => 'required',
            'incident_type' => 'required',
            'disability' => 'required',
            'pronounced_date' => 'required',
            'settled_date' => 'required',
            'status' => 'required',
            'incident_clinic_id' => 'required|exists:clinics,id',
        ];

    }

    public function attributes()
    {
        # code...
        return [
            'vessel_id' => 'Vessel',
            'incident_rank_id' => 'Rank',
            'incident_date' => 'Date of Illness/Injury',
            'repatriation_date' => 'Date of Repatriation	',
            'description' => 'Description of Illness/Injury	',
            'incident_type' => 'Type of Illness/Injury',
            'disability' => 'Disability',
            'pronounced_date' => 'Date Pronounced',
            'settled_date' => 'Date Settled',
            'status' => 'Status',
            'incident_clinic_id' => 'Clinic',
        ];
    }
}
