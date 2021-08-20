<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AirlineRequest extends FormRequest
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
            'code' => 'required|unique:airlines,code,' .$this->id,
            'airline' => 'required|unique:airlines,airline,' .$this->id
        ];
    }

    public function attributes()
    {
        return [
            'code' => 'Code',
            'airline' => 'Airline'
        ];
    }
}
