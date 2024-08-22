<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'name' => 'required | string | max:255',
            'price' => 'required | digits_between:4,10 ',

        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => "Bạn chưa nhập tên sản phẩm",
            'price.required' => 'Bạn chưa nhập giá sản phẩm',
            'price.digits_between' => "Giá sản phẩm tối thiểu phải là 1000"
        ];
    }
}
