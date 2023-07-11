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
            'desc' => ['string', 'max:200'],
            'instruction' => ['string', 'max:500'],
            'date_start' => ['date'],
            'date_end' => ['date', 'after_or_equal:date_start']
        ];
    }

    public function messages()
    {
        return [
            'instruction.string' => 'не пустым.',
            'desc.max' => 'не более 200 символов.',
            'desc.string' => 'не пустым.',
            'instruction.max' => 'не более 500 символов.',
            'date_start.date' => 'не пустым.',
            'date_end.date' => 'не пустым.',
            'date_end.after_or_equal' => 'равным дате начала или после даты начала.',
        ];
    }
}
