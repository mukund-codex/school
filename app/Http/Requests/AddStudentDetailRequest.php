<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddStudentDetailRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'student_id' => 'required|integer',
            'name_1' => 'required|max:255',
            'relation_1' => 'required|max:255',
            'contact_1' => 'required',
            'name_2' => 'required|max:255',
            'relation_2' => 'required|max:255',
            'contact_2' => 'required',
        ];
    }

    public function messages(): array
    {
        return trans('validation');
    }
}
