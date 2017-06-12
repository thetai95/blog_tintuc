<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TheLoaiRequest extends FormRequest
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
            'Ten' => 'required|min:3|max:100|unique:TheLoai,Ten,NULL,id,deleted_at,NULL'
        ];
    }

    public function messages()
    {
        return [
            'Ten.required' => 'Bạn chưa nhập tên thể loại',
            'Ten.min' => 'Tên thể loại phải có độ dài từ 3 - 100 ký tự',
            'Ten.max' => 'Tên thể loại phải có độ dài từ 3 - 100 ký tự',
            'Ten.unique' => 'Tên thể loại đã tồn tại',
        ];
    }
}
