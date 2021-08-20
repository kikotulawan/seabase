<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrewRequest extends FormRequest
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
            'application_date' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email:rfc|unique:crews,email,' .$this->id,
            'rank_id' => 'required|exists:ranks,id',
            'contact_address' => 'required',
            'image_path' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024'
        ];
    }
    public function attributes()
    {
        return [
            'application_date' => 'Application Date',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'Email Address',
            'rank_id' => 'Rank',
            'image_path' => 'Image',
            'contact_address' => 'Contact Address',
        ];
    }


}
