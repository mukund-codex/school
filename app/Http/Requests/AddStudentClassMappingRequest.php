<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddStudentClassMappingRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'student_id' => 'required|integer|exists:users,id',
            'class_id' => 'required|integer|exists:classes,id',
            'division_id' => 'required|integer|exists:divisions,id',
        ];
    }

    public function messages(): array
    {
        return trans('validation');
    }
}
