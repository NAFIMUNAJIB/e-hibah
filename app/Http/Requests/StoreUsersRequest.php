<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsersRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
                'min:8',              // Minimum length of 8 characters
                'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]/', // Must contain uppercase, lowercase, number, and special character
            ],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama Harus Diisi.',
            'email.required' => 'Email Harus Diisi.',
            'email.email' => 'Format Email Tidak Valid.',
            'email.unique' => 'Email Sudah Terdaftar.',
            'password.required' => 'Password Harus Diisi.',
            'password.min' => 'Password minimal harus :min.. karakter',
            'password.regex' => 'Harus berisi huruf besar, huruf kecil, angka, dan karakter khusus.',
        ];
    }
}
