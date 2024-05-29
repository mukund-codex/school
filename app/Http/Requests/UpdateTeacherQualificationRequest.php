<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTeacherQualificationRequest extends FormRequest
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
            'id' => 'required|integer|exists:teacher_qualifications,id',
            'teacher_id' => 'required|integer|exists:users,id',
            'school' => 'required|string',
            'degree' => 'required|string',
            'study' => 'required|string',
            'start_month' => 'required',
            'start_year' => 'required',
            'end_month' => 'required',
            'end_year' => 'required',
            'grade' => 'required',
            'description' => 'required',
        ];
    }

    public function messages(): array
    {
        return trans('validation');
    }
}
