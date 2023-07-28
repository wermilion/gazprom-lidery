<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResultRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'tabel_number' => ['nullable', 'digits_between:1,15'],
            'result_status_id' => ['nullable', 'numeric']
        ];
    }
}
