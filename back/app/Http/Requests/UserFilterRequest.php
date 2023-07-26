<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFilterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'tabel_number' => ['nullable', 'digits_between:1,9'],
            'branch_id' => ['nullable', 'numeric']
        ];
    }

    public function messages(): array
    {
        return [
            'tabel_number.digits_between' => 'Поле должно состоять только из цифр и быть не больше 9 цифр.',
        ];
    }
}
