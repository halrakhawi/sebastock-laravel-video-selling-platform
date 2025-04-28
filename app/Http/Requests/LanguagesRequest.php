<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LanguagesRequest extends FormRequest
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
            'name'=>'required|string|max:100',
            'abbr'=>'required|max:10',
            'direction'=>'required|in:rtl,ltr',
           // 'active'=>'required|in:0,1',

        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'هذا الحقل مطلوب',
            'name.string'=>'هذا الحقل يجب ان يكون حروف',
            'abbr.required'=>'هذا الحقل مطلوب',
            'abbr.max:10'=>'الاسم لا يزيد عن 100 حرف',
            'direction.required'=>'هذا الحقل مطلوب',
            'direction.in:rtl,ltr'=>'الاتجاه يجب ان تكون قيمته rtl,ltr',
            //'active.required'=>'هذا الحقل مطلوب',
            //'active.in:0,1'=>'الحالة اما 0 او 1',

        ];
    }
}
