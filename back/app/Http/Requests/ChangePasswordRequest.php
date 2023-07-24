<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

class ChangePasswordRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'new_password' => ['required', 'min:8', 'max:30'],
            'confirm_password' => ['required', 'same:new_password']
        ];
    }

    public function messages(): array
    {
        return [
            'new_password.required' => 'Обязательное',
            'new_password.min' => 'Содержать минимум 8 символов',
            'new_password.max' => 'Содержать максимум 30 символов.',
            'confirm_password.required' => 'Обязательное',
            'confirm_password.same' => "Совпадать с полем \"Новый пароль\"",
        ];
    }

    public function failedValidation(Validator $validator): void
    {
        if ($this->expectsJson()) {
            $errors = (new ValidationException($validator))->errors();
            throw new HttpResponseException(
                response([
                    'status' => false,
                    'errors' => $errors
                ])->setStatusCode(206)
            );
        }
        parent::failedValidation($validator);
    }
}
