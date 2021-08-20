<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RankRequest extends FormRequest
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
            'rank' => 'required|unique:ranks,rank,' .$this->id ,
            'code' => 'required|unique:ranks,code,' .$this->id,
            'department_id' => 'required|exists:departments,id'
        ];
    }
    public function attributes()
    {
        return [
            'rank' => 'Rank Name',
            'code' => 'Code',
            'department_id' => 'Department',
        ];
    }
}
