<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|min:3|max:255',
            'password' => 'required|min:3|max:20'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Lütfen email adresinizi girin',
            'email.min' => 'Minimum email alanı için 3 karakter girmelisiniz.',
            'email.max' => 'Maximum email alanı için 255 karakter girmelisiniz',
            'password.required' => 'Lütfen şifrenizi girin',
            'password.min' => 'Minimum şifre için 3 karakter girmelisiniz.',
            'password.max' => 'Maximum şifre için 20 karakter girmelisiniz'
        ];
    }
}
