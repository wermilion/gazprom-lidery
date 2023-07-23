<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'tabel_number' => ['required', 'numeric'],
            'password' => ['required', 'string'],
            'remember' => ['boolean']
        ];
    }

    public function failedValidation(Validator $validator): void
    {
        if ($this->expectsJson()) {
            throw new HttpResponseException(
                response([
                    'status' => false,
                    'errors' => 'Были введены некорректные данные.'
                ])
            );
        }
    }

    /**
     * @throws ValidationException
     */
    public function authenticate(): void
    {
        if (!Auth::attempt($this->only('tabel_number', 'password'), $this->boolean('remember'))) {
            throw ValidationException::withMessages([
                'status' => false,
                'message' => 'Ошибка авторизации'
            ]);
        }
    }
}
