<?php

namespace App\Http\Requests;

use Validator;
use App\Models\Branch;
use Illuminate\Foundation\Http\FormRequest;

class BranchRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'cyrillic', 'string', 'max:250', 'unique:' . Branch::class],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'обязательным.',
            'name.unique' => 'уникальным.',
            'name.cyrillic' => 'содержащим кириллицу и/или цифры, знаки.',
            'name.max' => 'имеющим не более 250 символов.',
        ];
    }
}
