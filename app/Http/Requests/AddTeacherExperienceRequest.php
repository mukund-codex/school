<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddTeacherExperienceRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'teacher_id' => 'required|integer|exists:users,id',
            'title' => 'required|string',
            'employment_type' => 'required|in:fulltime,parttime,selfemployed,freelance,internship,trainee',
            'company_name' => 'required',
            'location' => 'required',
            'location_type' => 'required|in:onsite,hybrid,remote',
            'start_month' => 'required|integer|between:1,12',
            'start_year' => 'required|integer|between:1900,2100',
            'end_month' => 'sometimes',
            'end_year' => 'sometimes',
            'current' => 'required|boolean',
            'description' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return trans('validation');
    }
}
