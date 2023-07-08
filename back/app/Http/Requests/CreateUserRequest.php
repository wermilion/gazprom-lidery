<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'tabel_number' => ['required', 'numeric', 'digits_between :1,9', ' unique:' . User::class],
            'password' => ['required', 'string']
        ];
    }

    public function messages(): array
    {
        return [
            'tabel_number.unique' => 'уникальным.',
            'tabel_number.numeric' => 'состоящим только из цифр.',
            'tabel_number.required' => 'обязательным.',
            'tabel_number.digits_between' => 'из 5 цифр.',
            'password.required' => 'обязательным.',
        ];
    }
}
