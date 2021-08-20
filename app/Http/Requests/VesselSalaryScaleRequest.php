<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VesselSalaryScaleRequest extends FormRequest
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
            'description' => 'required',
            'monthly' => 'required|numeric',
            'daily' => 'required|numeric',
            'rank_id' => 'required|exists:ranks,id'
        ];
    }

    public function attributes()
    {
        return [
            'description' => 'Description',
            'monthly' => 'Monthly',
            'daily' => 'daily',
            'rank_id' => 'Rank',
        ];
    }
}
