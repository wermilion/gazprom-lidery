<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DistanceRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'points' => ['required', 'numeric'],
        ];
    }

    public function messages(): array
    {
        return [
            'points.required' => 'не пустым.',
            'points.numeric' => 'состоящим только из цифр.',
        ];
    }
}
