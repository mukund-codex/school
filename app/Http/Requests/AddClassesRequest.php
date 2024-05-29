<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddClassesRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255'
        ];
    }

    public function messages(): array
    {
        return trans('validation');
    }
}
