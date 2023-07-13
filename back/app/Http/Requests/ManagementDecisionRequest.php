<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

class ManagementDecisionRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'problem' => ['required', 'string', 'max:200'],
            'management_task' => ['required', 'string', 'max:200'],
            'solution' => ['required', 'string', 'max:200'],
            'result' => ['required', 'string', 'max:200'],
            'conclusion' => ['required', 'string', 'max:200'],
            'check_file' => ['boolean']
        ];
    }

    public function messages()
    {
        return [
            'problem.required' => "Поле \"Проблема\" обязательное",
            'problem.max' => "Поле \"Проблема\" должно не превышать более 200 символов",
            'management_task.required' => "Поле \"Управленческая задача\" обязательное",
            'management_task.max' => "Поле \"Управленческая задача\" должно не превышать более 200 символов",
            'solution.required' => "Поле \"Решение\" обязательное",
            'solution.max' => "Поле \"Решение\" должно не превышать более 200 символов",
            'result.required' => "Поле \"Результат\" обязательное",
            'result.max' => "Поле \"Результат\" должно не превышать более 200 символов",
            'conclusion.required' => "Поле \"Вывод\" обязательное",
            'conclusion.max' => "Поле \"Вывод\" должно не превышать более 200 символов",
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
