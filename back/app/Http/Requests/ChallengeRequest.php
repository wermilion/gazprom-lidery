<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

class ChallengeRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'solution' => ['required', 'string', 'min:50', 'max:5000'],
            'check_file' => ['boolean']
        ];
    }

    public function messages()
    {
        return [
            'solution.required' => "Поле \"Решение\" обязательное",
            'solution.max' => "Поле \"Решение\" должно не превышать более 200 символов",
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
                ])
            );
        }
        parent::failedValidation($validator);
    }
}
