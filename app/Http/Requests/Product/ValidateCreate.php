<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ValidateCreate extends FormRequest
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
            'product_name' => 'required',
            'product_quantity' => 'required',
            'product_price' => 'required|max:225',
            'category_id' => 'required|max:225',
            'brand_id' => 'required|max:225',
            'product_images' => 'required',
            'product_content' => 'required',
            'product_sales' => 'required|max:225',
            'product_desc' => 'required',
            'product_slug' => 'required|max:225',
            'product_event' => 'required|max:225'
            
        ];
    }
    public function messages(){
        return [
            'product_name.required' => 'Tên Sản Phẩm không được để trống',
            'product_price.required' => 'Giá Sản Phẩm không được để trống',
            'product_quantity.required' => 'Số lượng không được để trống',
            'category_id.required' => 'Danh Mục Sản Phẩm không được để trống',
            'brand_id.required' => ' Thương Hiệu Sản Phẩm không được để trống',
            'product_images.required' => ' Hình Ảnh Không được để trống',
            'product_sales.required' => ' Giá Khuyến Mãi không được để trống',
            'product_content.required' => ' Mô Tả Dài không được để trống',
            'product_desc.required' => 'Mô Tả Ngắn không được để trống',
            'product_event.required' => 'sự kiện sản phẩm  không được để trống'
            
        ];
    }
}
