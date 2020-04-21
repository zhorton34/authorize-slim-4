<?php

namespace App\Http\Requests;

use App\Support\FormRequest;


class ShowResetPasswordRequest extends FormRequest
{
    public function rules()
    {
        return [
            'key' => 'exists:reset_passwords,key'
        ];
    }

    public function messages()
    {
        return [
            'key.exists' => "Reset Key Must Exist, we were not able to find one"
        ];
    }
}
