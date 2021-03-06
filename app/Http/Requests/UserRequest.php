<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

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
            'name' => 'required|between:3,25|regex:/^[A-Za-z0-9\-\_]+$/|unique:users,name,' . Auth::id(),
            'email' => 'required|email',
            'introduction' => 'max:80',
            'avatar' => 'mimes:png,jpg,gif,jpeg|dimensions:min_width=208,min_height=208',
        ];
    }

    public function messages(){
        return [
            'name.unique' => '此名稱已被使用',
            'name.regex' => '名稱只能使用英文、數字、底線',
            'name.between' => '名稱必須介於 3 - 25 個字之間',
            'name.required' => '請填寫名稱',
            'avatar.mimes' =>'頭貼必須是 png, jpg, gif, jpeg 格式的圖片',
            'avatar.dimensions' => '解析度過低，寬和高需要 208px 以上',
        ];
    }
}
