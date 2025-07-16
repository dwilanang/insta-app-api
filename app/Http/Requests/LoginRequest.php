<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true; // set true kalau nggak pakai Gate/Policy
    }

    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => [
                'required',
                'min:6',
                'regex:/^(?=.*[a-zA-Z])(?=.*\d).+$/',
            ],
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 6 karakter.',
            'password.regex' => 'Password harus mengandung kombinasi huruf dan angka.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'message' => 'Login gagal, Coba lagi!',
            'errors' => $validator->errors()
        ], 422));
    }
}
