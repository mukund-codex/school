<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'first_name' => ['required','max:255'],
            'last_name' => ['required', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'mobile' => ['required','numeric','digits:10', Rule::unique(User::class)->ignore($this->user()->id)],
            'gender' => ['required','in:male,female'],
            'dob' => ['required','date'],
            'address' => ['required'],
            'profile_picture' => ['sometimes','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
            'password' => ['nullable','min:8'],
            'confirm_password' => ['required_with:password','same:password'],
        ];
    }

    public function messages(): array
    {
        return trans('validation');
    }
}
