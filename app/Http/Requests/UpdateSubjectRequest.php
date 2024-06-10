<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSubjectRequest extends FormRequest
{
    protected function prepareForValidation(): void
    {
        $this->merge([
            'id' => $this->route('id'),
        ]);
    }

    public function rules(): array
    {
        return [
            'id' => 'required|exists:subjects,id',
            'name' => 'required|string|max:255',
            'code' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return trans('validation');
    }
}
