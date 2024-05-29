<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetDivisionsListRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|integer|exists:classes,id',
        ];
    }

    public function messages(): array
    {
        return trans('validation');
    }
}
