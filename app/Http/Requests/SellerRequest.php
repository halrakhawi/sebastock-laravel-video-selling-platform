<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SellerRequest extends FormRequest
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
            'name'=>'required',
            //'picture'=>'required',
            'email'=>'required|email|unique:sellers',
            'password'=>'required',
        ];
    }

    public function messages(){
        return [
             'email.unique'=>'Email was used from another user.',
            'email.required'=>'البريد الالكتروني مطلوب',
            'email.email'=>'صيغة البريد الالكتروني غير صحيحة',
            'password.required'=>'كلمة المرور مطلوبة',
        ];
    }
}
