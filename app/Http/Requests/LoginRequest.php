<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => 'required|email|exists:users,email',
            'role' => 'required|in:admin,teacher,librarian,parent,student',
            'password' => 'required'
        ];
    }

    public function messages(): array
    {
        return trans('validation');
    }
}
