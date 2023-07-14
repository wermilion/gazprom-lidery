<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

class AnketaRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'cyrillic', 'alpha', 'string', 'min:2', 'max:35'],
            'surname' => ['required', 'cyrillic', 'alpha', 'string', 'min:1', 'max:55'],
            'position' => ['required', 'string', 'min:4', 'max:55'],
            'work_experience' => ['required', 'integer', 'min:1', 'max:2'],
            'branch_id' => ['required', 'integer'],
            'check_video' => ['required', 'bool', 'accepted'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Поле \"Имя\" обязательное",
            'name.alpha' => "Поле \"Имя\" не должно содержать цифры и символы",
            'name.max' => "Поле \"Имя\" должно не превышать больше 30 символов",
            'surname.required' => "Поле \"Фамилия\" обязательное",
            'surname.alpha' => "Поле \"Фамилия\" не должно содержать цифры и символы",
            'surname.max' => "Поле \"Фамилия\" должно не превышать больше 30 символов",
            'position.required' => "Поле \"Должность\" обязательное",
            'position.max' => "Поле \"Должность\" должно не превышать больше 30 символов",
            'work_experience.required' => "Поле \"Стаж\" обязательное",
            'work_experience.integer' => "Поле \"Стаж\" должно состоять из целого числа",
            'check_video.required' => "Это обязательное поле",
            'branch_id.required' => "Поле \"Филиал\" обязательное",
            'check_video.accepted' => "Это обязательное поле"
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
