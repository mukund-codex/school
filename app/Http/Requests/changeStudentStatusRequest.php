<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class changeStudentStatusRequest extends FormRequest
{
    protected function prepareForValidation(): void
    {
        $this->merge([
            'id' => (int) $this->route('id')
        ]);
    }

    public function rules(): array
    {
        return [
            'id' => 'required|integer|exists:users,id'
        ];
    }

    public function messages(): array
    {
        return trans('validation');
    }
}
