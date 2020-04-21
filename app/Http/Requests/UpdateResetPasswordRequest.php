<?php

namespace App\Http\Requests;

use App\Support\FormRequest;

class UpdateResetPasswordRequest extends FormRequest
{
    public function rules()
    {
        return [
            'password' => 'required_with:confirm_password|same:confirm_password|min:5',
            'confirm_password' => 'string|required'
        ];
    }

    public function messages()
    {
        return [
            'password.same' => ':attribute does not match :same',
            'password.required_with' => ':attribute needs :required_with to properly validate',
            'confirm_password.required' => ':attribute is required',
            'confirm_password.string' => ':attribute must be a string'
        ];
    }
}
