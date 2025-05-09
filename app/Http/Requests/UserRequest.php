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
            //'name'=>'required',
            //'picture'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required',
            //'address'=>'required',
            //'mobile'=>'required',
        ];
    }

    public function messages(){
        return [
             'email.unique'=>'Email was used from another user.',
            'email.required'=>'Email is requier',
            'email.email'=>'You must enter vaild email',
            'password.required'=>'Password is require',
            'address.required'=>'Address is require',
            'mobile.required'=>'Phone is require',
        ];
    }
}
