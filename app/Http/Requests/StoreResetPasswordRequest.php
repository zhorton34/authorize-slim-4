<?php

namespace App\Http\Requests;

class StoreResetPasswordRequest extends FormRequest
{
    /**
     * Prepare Request Input For Validation
     * ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
     * $this->all();
     * $this->forget('existing_field');
     * $this->new_field = 'Example Value';
     * $this->existing_field = sha1($this->existing_field);
     */
    protected function prepareForValidation()
    {
        //
    }

    /**
     * Add Request Validation Rules
     * See: https://laravel.com/docs/7.x/validation#available-validation-rules
     */
    public function rules()
    {
        return [
            'email' => 'required|email|exists:users,email'
        ];
    }

    /**
     * Add Custom Request Validation Messages When Validation Fails
     * See: base_path('languages/en/validation.php') file
     */
    public function messages()
    {
        return [
            'email.required' => 'Email is required',
            'email.email' => 'Email must be an email',
            'email.exists' => 'Email does not exist'
        ];
    }

    protected function afterValidationPasses()
    {
        //
    }

    protected function afterValidationFails()
    {
        //
    }

    protected function afterValidation()
    {
        //
    }
}
