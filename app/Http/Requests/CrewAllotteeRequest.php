<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrewAllotteeRequest extends FormRequest
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
            'bank_id' => 'required|exists:banks,id',
            'branch_id' => 'required|exists:branches,id',
            'account_name' => 'required',
            'account_number' => 'required',
            'relationship' => 'required',
            'allotment' => 'required|numeric',
        ];
    }

    public function attributes()
    {
        # code...
        return [
            'bank_id' => 'Bank',
            'branch_id' => 'Branch',
            'account_name' => 'Account Name',
            'account_number' => 'Account Number',
            'relationship' => 'Relationship',
            'allotment' => 'Allotment',
        ];
    }
}
