<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetTeacherDetailRequest extends FormRequest
{
    public function prepareForValidation(): void
    {
        $this->merge([
            'id' => (int) $this->route('id')
        ]);
    }

    public function rules(): array
    {
        return [
            'id' => 'required|integer|exists:teacher_details,id'
        ];
    }

    public function messages(): array
    {
        return trans('validation');
    }
}
