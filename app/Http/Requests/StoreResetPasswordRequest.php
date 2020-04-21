<?php

namespace App\Http\Requests;

use App\Support\FormRequest;


class StoreResetPasswordRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => 'required|email|exists:users,email'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email is required',
            'email.email' => 'Email must be an email',
            'email.exists' => 'Email doesnt exist'
        ];
    }
}
