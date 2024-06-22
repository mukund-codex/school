<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLeaveRequest extends FormRequest
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
            'id' => 'required|exists:leaves,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'type' => 'required|in:sick,casual,unpaid,maternity,paternity,other,half_day,full_day',
            'reason' => 'required|string|max:255',
            'comment' => 'nullable|string|max:255',
        ];
    }

    public function messages(): array
    {
        return trans('validation');
    }
}
