<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddLeaveRequest extends FormRequest
{
    public function rules(): array
    {
        return [
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
