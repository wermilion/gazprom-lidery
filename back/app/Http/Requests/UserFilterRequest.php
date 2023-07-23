<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFilterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'tabel_number' => ['nullable', 'integer'],
            'branch_id' => ['nullable', 'integer']
        ];
    }

    public function messages()
    {
        return [
            'tabel_number.integer' => 'Поле должно состоять только из цифр.',
        ];
    }
}
