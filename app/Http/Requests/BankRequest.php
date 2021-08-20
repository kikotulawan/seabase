<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BankRequest extends FormRequest
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
            'code' => 'required|unique:banks,code,' .$this->id,
            'bank' => 'required|unique:banks,bank,' .$this->id,
        ];
    }
    
    public function attributes()
    {
        return [
            'code' => 'Code',
            'bank' => 'Bank Name',
        ];
    }
}
