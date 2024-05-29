<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAttendanceRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'student_id' => 'required|integer|exists:users,id|exists:students_classes_mapping,student_id',
            'class_id' => 'required|integer|exists:classes,id|exists:students_classes_mapping,class_id',
            'division_id' => 'required|integer|exists:divisions,id|exists:students_classes_mapping,division_id',
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
