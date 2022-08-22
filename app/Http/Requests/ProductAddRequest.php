<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductAddRequest extends FormRequest
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
            'name'=>'required',
            'price'=>'required',
            'content'=>'required',
            'category_id' => 'required||not_in:0',
            'brand_id' =>'required||not_in:0'
        ];
    }


    public function messages(){
        return [
            'category_id.not_in'=>'You must choose specific category in this dropdown list',
            'brand_id.not_in'=>'You must choose specific role in this dropdown list'
        ];
    }
}
