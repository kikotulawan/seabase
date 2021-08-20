<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrewFlagStateDocumentRequest extends FormRequest
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

            'license_type_id' => 'required|exists:licenses,id',
            'flag_id' => 'required|exists:flag_state_documents,id',
            'document_number' => 'required',
            'issue_date' => 'required',
        ];

    }

    public function attributes()
    {
        # code...
        return [
            'license_type_id' => 'License',
            'flag_id' => 'Flag State Document',
            'document_number' => 'Document Number',
            'issue_date' => 'Issue Date'
        ];
    }
}
