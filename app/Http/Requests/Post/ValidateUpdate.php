<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class ValidateUpdate extends FormRequest
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
            'post_title' => 'required',
            'post_slug' => 'required',
            'category_post_id' => 'required',
            'post_content' => 'required',
            'post_desc' => 'required',
            'post_keywords' => 'required',
            'post_meta_desc' => 'required'            
        ];
    }
    public function messages(){
        return [
            'post_title.required' => 'Tên Bài Viết không được để trống',
            'post_slug.required' => 'Tên Đường Dẫn không được để trống',
            'category_post_id.required' => 'Danh Mục Viết không được để trống',
            'post_content.required' => ' Mô Tả Dài không được để trống',
            'post_desc.required' => ' Mô Tả ngắn không được để trống',
            'post_keywords.required' => 'từ khóa Bài Viết không được để trống',
            'post_meta_desc.required' => 'Thể mô tả Bài Viết không được để trống'
            
        ];
    }
}
