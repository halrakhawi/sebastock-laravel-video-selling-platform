<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            //'translation_lang'=>'required',
            'name'=>'required',
            'picture'=>'required',
            //'active'=>'required',
        ];
    }

    public function messages(){
        return [
            'name.required'=>'This field is required',
           // 'translation_lang.required'=>'This field is required',
            'picture.required'=>'This field is required',
        ];
    }
}
