<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LicenseRequest extends FormRequest
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
            'code' => 'required|unique:licenses,code' .$this->id,
            'license' => 'required|unique:licenses,license,' .$this->id,
            'notifydays' => 'required|numeric',
        ];
    }
    public function attributes()
    {
        return [
            'code' => 'Code',
            'license' => 'License Name',
            'notifydays' => 'Days to Notify',
        ];
    }
}
