<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetSubjectRequest extends FormRequest
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
        ];
    }

    public function messages(): array
    {
        return trans('validation');
    }
}
