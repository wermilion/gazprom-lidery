<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StageRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['string', 'max:100', 'cyrillic'],
            'instruction' => ['string', 'max:500'],
            'date_start' => ['date'],
            'date_end' => ['date', 'after_or_equal:date_start']
        ];
    }

    public function messages()
    {
        return [
            'name.string' => 'не пустым.',
            'instruction.string' => 'не пустым.',
            'name.max' => 'не более 100 символов.',
            'name.cyrillic' => 'состоящим только из кириллицы.',
            'instruction.max' => 'не более 500 символов.',
            'date_start.date' => 'не пустым.',
            'date_end.date' => 'не пустым.',
            'date_end.after_or_equal' => 'равным дате начала или после даты начала.',
        ];
    }
}
