<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddSchedulesRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'teacher_id' => 'required|integer|exists:users,id',
            'class_id' => 'required|integer|exists:classes,id',
            'division_id' => 'required|integer|exists:divisions,id',
            'subject_id' => 'required|integer|exists:subjects,id',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
            'date' => 'sometimes|date',
        ];
    }

    public function messages(): array
    {
        return trans('validation');
    }
}
