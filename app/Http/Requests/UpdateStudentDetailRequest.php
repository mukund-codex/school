<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentDetailRequest extends FormRequest
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
            'id' => 'required|integer|exists:student_details,id',
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
