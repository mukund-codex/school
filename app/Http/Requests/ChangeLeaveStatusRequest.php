<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangeLeaveStatusRequest extends FormRequest
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
            'id' => 'required|integer|exists:leaves,id',
            'status' => 'required|string|in:approved,rejected',
        ];
    }

    public function messages(): array
    {
        return trans('validation');
    }
}
