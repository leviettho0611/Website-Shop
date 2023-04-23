<?php

namespace App\Http\Requests\ApiRequest;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'email'=>'required|max:25',
            'password'=>'required|max:20',
            //'country'=>'required',
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',

        ]; 
    }
    public function messages()
    {
        return [
          'required'=>':attribute Khong duoc de trong',
          'max'=>':attribute khong duoc quá ky tu',
          'avatar' => ':attribute : Hinh anh upload len phai la hình ảnh',
          'mimes' => ':attribute : Hinh anh upload len phai dinh dang như sau:jpeg,png,jpg,gif',
          'avatar.max' => ':attribute : Hinh anh upload len vuot qua kich thuoc cho phep :max'
          ];  
    }
}
