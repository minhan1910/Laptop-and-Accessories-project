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
            // Validate user create account
            'name'=>'required | min:6',
            'email'=>'required | email|unique:users,email',
            'password'=>'required| min:8',
            'street' => 'required | min:10',
            'ward'=>'required',
            'district'=>'required',
            'role' => 'required||not_in:0'
        ];
    }
    public function messages()
    {
        return [
            'role.not_in'=>'You must choose specific role in this dropdown list',
            'email:unique'=>'email already exist on system'
        ];
    }
}
