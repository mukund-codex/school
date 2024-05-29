<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddTeacherQualificationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
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
