<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddDivisionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'class_id' => 'required|integer|exists:classes,id',
            'name' => 'required|string|max:255'
        ];
    }

    public function messages(): array
    {
        return trans('validation');
    }
}
