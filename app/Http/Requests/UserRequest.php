<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|unique:users,name,' .$this->id,
            'email' => 'required|email|unique:users,email,' .$this->id,
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Name',
            'email' => 'Email Address',
            'password' => 'Password',
            'roles' => 'Roles'
        ];
    }
}
