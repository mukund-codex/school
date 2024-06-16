<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeleteScheduleRequest extends FormRequest
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
            'id' => 'required|exists:schedules,id',
        ];
    }

    public function messages(): array
    {
        return trans('validation');
    }
}
