<?php

namespace App\Http\Requests\FrontendRequest;

use Illuminate\Foundation\Http\FormRequest;

class EditProductRequest extends FormRequest
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
            'name'=>'required|max:191',
            'price'=>'required|max:191',
            'id_category'=>'required',
            'id_brand'=>'required',
            'image.*'=>'image|mimes:jpeg,png,jpg,gif|max:2048',
            
        ];
    }
    public function messages()
    {
        return [
            'required'=>':attribute Không được để trống',
            'max'=>':attribute Không được quá :max ký tự',
            'image' => ':attribute phai la hình ảnh',
            'mimes' => ':attribute phai dinh dang như sau:jpeg,png,jpg,gif',
            
        ];
    }
}
