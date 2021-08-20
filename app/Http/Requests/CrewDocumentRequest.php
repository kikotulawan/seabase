<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrewDocumentRequest extends FormRequest
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
            'document_id' => 'required|exists:documents,id',
            'document_number' => 'required',
            'issue_date' => 'required',
        ];
    }

    public function attributes()
    {
        # code...
        return [
            'document_id' => 'Document',
            'document_number' => 'Document Number',
            'issue_date' => 'Issue Date'
        ];
    }
}
