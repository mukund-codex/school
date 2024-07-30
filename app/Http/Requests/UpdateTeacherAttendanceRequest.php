<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTeacherAttendanceRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'teacher_id' => 'required|integer|exists:users,id',
            'attendance' => 'required|in:present,absent',
            'attendance_date' => 'required|date|date_format:Y-m-d',
            'attendance_id' => 'nullable|integer|exists:student_attendances,id'
        ];
    }

    public function messages(): array
    {
        return trans('validation');
    }
}
