<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'name' => 'required|min:3|max:255',
            'email' => 'required|min:3|max:255'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Lütfen isminizi girin',
            'name.min' => 'Minimum isim için 3 karakter girmelisiniz.',
            'name.max' => 'Maximum isim için 255 karakter girmelisiniz',
            'email.required' => 'Lütfen email adresinizi girin',
            'email.min' => 'Minimum email alanı için 3 karakter girmelisiniz.',
            'email.max' => 'Maximum email alanı için 255 karakter girmelisiniz',
            'email.unique' => 'Daha önce böyle bir email adresi kullanıldı.',
            'password.min' => 'Minimum şifre için 3 karakter girmelisiniz.',
            'password.max' => 'Maximum şifre için 20 karakter girmelisiniz'
        ];
    }
}
