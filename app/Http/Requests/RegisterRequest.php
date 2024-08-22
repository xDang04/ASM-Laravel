<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'fullname' => 'required | string | max:255',
            'username' =>'required|string|max:255',
            'email' =>'required|email|max:255|unique:users,email',
            'phone' => 'required | regex:/^([0-9\s\-\+\(\)]*)$/|unique:users,phone',
            'password' => 'required|string|min:8|confirmed',
            'address' =>'required|string|max:255',
        ];
    }
    public function messages(): array
    {
        return[
            'fullname.required' => "Bạn chưa nhập fullname",
            'username.required' => "Bạn chưa nhập username",
            'email.required' => "Bạn chưa nhập email",
            'email.email' => "Email không đúng định dạng",
            'email.max' => "Email quá dài",
            'email.unique' => "Email đã tồn tại",
            'password.required' => "Bạn chưa nhập mật khẩu",
            'password.min' => "Mật khẩu phải có ít nhất 8 kí tự",
            'password.confirmed' => "Mật khẩu không trùng nhau",
            'phone.required' => "Bạn chưa nhập số điện thoại",
            'phone.regex' => "Số điện thoại không đúng định dạng",
            'phone.unique' => "Số điện thoại đã tồn tại",
            'address.required' => "Bạn chưa nhập địa chỉ",
        ];
    }
}
