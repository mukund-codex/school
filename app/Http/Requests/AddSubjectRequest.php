<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddSubjectRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'code' => 'required|string|unique:subjects,code',
        ];
    }

    public function messages(): array
    {
        return trans('validation');
    }
}
