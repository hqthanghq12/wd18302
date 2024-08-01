<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'integer', 'min:1'],
            'quantity' => ['required', 'integer', 'min:1'],
            'image' => ['required', 'image', 'mimes:jpg,png,jpeg', 'max:2048'],
            'category_id' => ['required', 'exists:categories,id'],
        ];
    }
    public function messages(): array
    {
        return [
                'name.required' => 'Tên không được bỏ trống',
                'name.string' => 'Tên phải là kiểu ký tự',
                'name.max' => 'Tên không được quá 255 ký tự',
                //lab5
                'price.required' => 'Giá không được để trống',
                'price.integer' => 'Giá phải là số nguyên',
                'price.min' => 'Giá phải lớn hơn hoặc bằng 1',

                'quantity.required' => 'Số lượng không được để trống',
                'quantity.integer' => 'Số lượng phải là số nguyên',
                'quantity.min' => 'Số lượng phải lớn hơn hoặc bằng 1',

                'image.required' => 'Hình ảnh không được để trống',
                'image.image' => 'File phải là hình ảnh',
                'image.mimes' => 'Hình ảnh phải có định dạng jpg, png hoặc jpeg',
                'image.max' => 'Hình ảnh không được lớn hơn 2048 KB',

                'category_id.required' => 'Danh mục không được để trống',
                'category_id.exists' => 'Danh mục không hợp lệ',
        ];
    }
}
