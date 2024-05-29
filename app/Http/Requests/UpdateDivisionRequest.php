<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDivisionRequest extends FormRequest
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
            'id' => 'required|integer|exists:divisions,id',
            'name' => 'required|string|max:255',
            'class_id' => 'required|integer|exists:classes,id'
        ];
    }

    public function messages(): array
    {
        return trans('validation');
    }
}
