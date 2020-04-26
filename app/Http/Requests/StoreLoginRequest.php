<?php

namespace App\Http\Requests;

class StoreLoginRequest extends FormRequest
{
    protected function afterValidationPasses()
    {
        $this->password = sha1($this->password);
    }

    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|string'
        ];
    }
}
