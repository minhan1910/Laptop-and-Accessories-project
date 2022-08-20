<?php

namespace App\Http\Requests\Admin\Role;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRoleRequest extends FormRequest
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
        if (session('roleId'))
            $roleId = session('roleId');
        return [
            'name' => [
                'required',
                Rule::unique('roles')->ignore($roleId)
            ],
            'description' => 'required',
        ];
    }
}