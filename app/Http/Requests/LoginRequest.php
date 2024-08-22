<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required | email | exists:users,email',
            'password' => 'required ',
            // 'remember' => 'nullable|boolean',
        ];
    }
    public function messages(): array
    {
        return [
            //
            'email.required' => "Bạn chưa nhập email.",
            'email.email' => "Email chưa đúng định dạng, ví dụ : abc123@gmai.com",
            'email.exists' => "Email chưa được đăng kí.",
            'password.required' => "Bạn chưa nhập pasword",
            // 'password.min' => "Mật khẩu ít nhất phải có 5 kí tự",

        ];
    }
}
