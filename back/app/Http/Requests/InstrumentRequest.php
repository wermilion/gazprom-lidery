<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InstrumentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'min_points' => ['required', 'numeric'],
            'task' => ['string', 'max:200']
        ];
    }

    public function messages(): array
    {
        return [
            'min_points.required' => 'не пустым.',
            'min_points.unique' => 'уникальным.',
            'min_points.numeric' => 'числом.',
            'task.string' => 'не пустым.',
            'task.max' => 'не более 200 символов.',
        ];
    }
}
