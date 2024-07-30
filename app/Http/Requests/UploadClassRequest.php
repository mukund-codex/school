<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadClassRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'csv_file' => 'required|file|mimes:csv,txt',
        ];
    }

    public function messages(): array
    {
        return trans('validation');
    }
}
