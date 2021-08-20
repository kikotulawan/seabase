<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AirportRequest extends FormRequest
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
            'code' => 'required|unique:airports,code,' .$this->id,
            'airport' => 'required|unique:airports,airport,' .$this->id,
            'country_id' => 'required|exists:countries,id',
        ];
    }

    public function attributes()
    {
        return [
            'code' => 'Code',
            'airport' => 'Airport',
            'country_id' => 'Country',
        ];
    }
}
