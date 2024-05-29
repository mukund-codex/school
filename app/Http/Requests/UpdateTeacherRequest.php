<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTeacherRequest extends FormRequest
{
    public function prepareForValidation(): void
    {
        $this->merge([
            'id' => (int)$this->route('id'),
        ]);
    }

    public function rules(): array
    {
        return [
            'id' => 'required|integer|exists:users,id',
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'mobile' => 'required|numeric|digits:10',
            'dob' => 'required|date',
            'gender' => 'required|in:male,female',
            'address' => 'required|max:255',
            'profile_picture' => 'nullable|image|max:2048',
        ];
    }

    public function messages(): array
    {
        return trans('validation');
    }
}
