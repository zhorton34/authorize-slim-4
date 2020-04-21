<?php

namespace App\Http\Requests;

use App\Support\FormRequest;

class LoginUserRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|string'
        ];
    }
}
