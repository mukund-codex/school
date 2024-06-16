<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetScheduleRequest extends FormRequest
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
            'id' => 'required|integer|exists:schedules,id',
        ];
    }

    public function messages(): array
    {
        return trans('validation');
    }
}
