<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'name'             => ['required'],
            'gender'           => ['required'],
            'address'          => ['required'],
            'phone_number'     => ['required'],
            'current_password' => ['nullable'],
            'password'         => ['nullable', 'min:8', 'confirmed'],
            'profile_picture'  => ['nullable'],
        ];
    }
}
