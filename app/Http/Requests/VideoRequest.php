<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VideoRequest extends FormRequest
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
            'url'=>'required',
            //'seller_id'=>'required',
            //'details'=>'required',
            //'cat_id'=>'required',
        ];
    }

    public function messages(){
        return [
            'name.required'=>'name of video field is required',
           // 'translation_lang.required'=>'This field is required',
            //'url.required'=>'This field is required',
          
        ];
    }
}
