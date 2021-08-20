<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VaccineRequest extends FormRequest
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
            'vaccine' => 'required|unique:vaccines,vaccine,' .$this->id,
            'notifydays' => 'required|numeric'
        ];
    }

    public function attributes()
    {
        return [
            'vaccine' => 'Vaccine Name',
            'notifydays' => 'Days of Notify'
        ];
    }
}
