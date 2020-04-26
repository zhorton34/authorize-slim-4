<?php

namespace App\Http\Requests;

use App\Listeners\FlashSuccessMessage;

class StoreRegisterRequest extends FormRequest
{
    protected function afterValidationPasses()
    {
        $this->forget('csrf_value');
        $this->forget('csrf_name');
        $this->forget('confirm_password');
        $this->password = sha1($this->password);
    }

    public function rules()
    {
        return [
            'email' => 'unique:users,email|email|required',
            'password' => 'required_with:confirm_password|same:confirm_password|min:5',
            'confirm_password' => 'string|required'
        ];
    }

    public function messages()
    {
        return [
            'password.same' => ':attribute does not match :same',
            'password.required_with' => ':attribute needs :required_with to properly validate',
            'email.unique' => ':attribute already exists',
            'email.email' => ':attribute must be an email',
            'email.required' => ':attribute is required',
            'confirm_password.required' => ':attribute is required',
            'confirm_password.string' => ':attribute must be a string'
        ];
    }
}
