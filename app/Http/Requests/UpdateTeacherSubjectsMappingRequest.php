<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTeacherSubjectsMappingRequest extends FormRequest
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
            'teacher_id' => 'required|integer|exists:users,id',
            'subject_id' => 'required|integer|exists:subjects,id',
            'id' => 'required|integer|exists:teacher_subjects_mappings,id',
            'experience' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return trans('validation');
    }
}
