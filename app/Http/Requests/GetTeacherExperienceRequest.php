<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetTeacherExperienceRequest extends FormRequest
{
    protected function prepareForValidation(): void
    {
        $this->merge([
            'id' => (int) $this->route('id'),
        ]);
    }

    public function rules(): array
    {
        return [
            'id' => 'required|integer|exists:teacher_experiences,id'
        ];
    }

    public function messages(): array
    {
        return trans('validation');
    }
}
