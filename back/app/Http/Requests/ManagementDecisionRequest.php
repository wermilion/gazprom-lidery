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
            'problem' => ['required', 'string', 'min:50', 'max:1000'],
            'management_task' => ['required', 'string', 'min:50', 'max:1000'],
            'solution' => ['required', 'string', 'min:50', 'max:1000'],
            'result' => ['required', 'string', 'min:50', 'max:1000'],
            'conclusion' => ['required', 'string', 'min:50', 'max:1000'],
            'check_file' => ['bool']
        ];
    }

    public function messages()
    {
        return [
            'problem.required' => "Поле \"Проблема\" обязательное",
            'problem.max' => "Поле \"Проблема\" должно не превышать более 1000 символов",
            'problem.min' => "Поле \"Проблема\" должно иметь минимум 50 символов",
            'management_task.required' => "Поле \"Управленческая задача\" обязательное",
            'management_task.max' => "Поле \"Управленческая задача\" должно не превышать более 1000 символов",
            'management_task.min' => "Поле \"Управленческая задача\" должно иметь минимум 50 символов",
            'solution.required' => "Поле \"Решение\" обязательное",
            'solution.max' => "Поле \"Решение\" должно не превышать более 1000 символов",
            'solution.min' => "Поле \"Решение\" должно иметь минимум 50 символов",
            'result.required' => "Поле \"Результат\" обязательное",
            'result.max' => "Поле \"Результат\" должно не превышать более 1000 символов",
            'result.min' => "Поле \"Результат\" должно иметь минимум 50 символов",
            'conclusion.required' => "Поле \"Вывод\" обязательное",
            'conclusion.max' => "Поле \"Вывод\" должно не превышать более 1000 символов",
            'conclusion.min' => "Поле \"Вывод\" должно иметь минимум 50 символов",
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
