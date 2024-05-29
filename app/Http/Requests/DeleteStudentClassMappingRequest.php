<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeleteStudentClassMappingRequest extends FormRequest
{
    protected function prepareForValidation(): void
    {
        $this->merge([
            'id' => $this->route('id')
        ]);
    }

    public function rules(): array
    {
        return [
            'id' => 'required|exists:students_classes_mapping,id'
        ];
    }

    public function messages(): array
    {
        return trans('validation');
    }
}
