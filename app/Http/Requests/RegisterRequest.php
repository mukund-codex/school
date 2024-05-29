<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'first_name' => 'required|max:255',
            'last_name' =>  'required|max:255',
            'email' => 'required|email|unique:users,email',
            'mobile' => 'required|numeric|unique:users,mobile',
            'dob' => 'required|date',
            'role' => 'required|in:admin,teacher,librarian,parent,student',
            'password' => 'required|min:8'
        ];
    }

    public function messages(): array
    {
        return trans('validation');
    }
}
