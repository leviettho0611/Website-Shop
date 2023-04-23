<?php

namespace App\Http\Requests\AdminRequest;

use Illuminate\Foundation\Http\FormRequest;

class AddBlogRequest extends FormRequest
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

            'name'=>'required|max:20',
            'image' => 'image|mimes:png,jpg,jpeg|max:2048',
            'description'=>'required',
            'content'=>'required',
        ];
        
    }
    public function messages()
    {
        return [
          'required'=>':attribute Khong duoc de trong',
          'max'=>':attribute khong duoc quá ky tu',
          ];  
    }
}
