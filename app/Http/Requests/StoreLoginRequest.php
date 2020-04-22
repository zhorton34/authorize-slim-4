<?php

namespace App\Http\Requests;

class StoreLoginRequest extends FormRequest
{
    protected function afterValidationPasses()
    {
        $this->password = sha1($this->password);

        session()->flash()->set('success', ['Success, welcome Back!']);
    }

    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|string'
        ];
    }
}
