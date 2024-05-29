<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTeacherDetailRequest extends FormRequest
{
    public function prepareForValidation(): void
    {
        $this->merge([
            'id' => (int) $this->route('id')
        ]);
    }

    public function rules(): array
    {
        return [
            'id' => 'required|integer|exists:teacher_details,id',
            'name_1' => 'required|max:255',
            'relation_1' => 'required',
            'contact_1' => 'required|digits:10',
            'name_2' => 'required|max:255',
            'relation_2' => 'required',
            'contact_2' => 'required|digits:10'
        ];
    }

    public function messages(): array
    {
        return trans('validation');
    }
}
