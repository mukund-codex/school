<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddTeacherSubjectMappingRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'teacher_id' => 'required|integer|exists:users,id',
            'subject_id' => 'required|integer|exists:subjects,id',
            'experience' => 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return trans('validation');
    }
}
