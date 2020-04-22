<?php

namespace App\Http\Requests;

class UpdateResetPasswordRequest extends FormRequest
{
    /**
     * Add Request Validation Rules
     * See: https://laravel.com/docs/7.x/validation#available-validation-rules
     */
    public function rules()
    {
        return [
            'password' => 'required_with:confirm_password|same:confirm_password|min:5',
            'confirm_password' => 'string|required'
        ];
    }

    /**
     * Add Custom Request Validation Messages When Validation Fails
     * See: base_path('languages/en/validation.php') file
     */
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
