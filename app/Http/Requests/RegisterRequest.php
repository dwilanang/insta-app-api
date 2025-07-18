<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true; // set true kalau nggak pakai Gate/Policy
    }

    public function rules()
    {
        return [
            'name' => 'required|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
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
            'name.required' => 'Nama wajib diisi.',
            'name.max' => 'Nama maksimal 100 character.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 6 karakter.',
            'password.regex' => 'Password harus mengandung kombinasi huruf dan angka.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'message' => 'Register gagal, Coba lagi!',
            'errors' => $validator->errors()
        ], 422));
    }
}
