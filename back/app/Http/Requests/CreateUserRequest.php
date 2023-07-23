<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'tabel_number' => ['required', 'numeric', 'max_digits:9', 'unique:' . User::class],
            'password' => ['required', 'string']
        ];
    }

    public function messages(): array
    {
        return [
            'tabel_number.unique' => 'уникальным.',
            'tabel_number.numeric' => 'состоящим только из цифр (0-9).',
            'tabel_number.required' => 'обязательным.',
            'tabel_number.max_digits' => 'содержать не более 9 символов.',
            'password.required' => 'обязательным.',
        ];
    }
}
