<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFilterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'tabel_number' => ['numeric']
        ];
    }

    public function messages()
    {
        return [
            'tabel_number.numeric' => 'Поле должно состоять только из цифр.',
        ];
    }
}
