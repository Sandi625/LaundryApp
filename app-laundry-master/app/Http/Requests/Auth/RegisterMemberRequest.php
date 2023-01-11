<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterMemberRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * Tentukan apakah pengguna berwenang untuk membuat permintaan ini.

     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * Dapatkan aturan validasi yang berlaku untuk permintaan.

     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'     => ['required'],
            'email'    => ['required', 'email', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:8'],
        ];
    }
}
