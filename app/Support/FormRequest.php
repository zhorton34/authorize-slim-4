<?php

namespace App\Support;

class FormRequest extends RequestInput
{
    protected $validator;

    public function validator()
    {
        return $this->validator;
    }

    public function failed() : bool
    {
        return $this->validator()->fails();
    }

    public function validate()
    {
        $this->prepareForValidation();

        $this->validator = session()->validator(
            $this->all(),
            $this->rules(),
            $this->messages()
        );

        if ($this->validator->fails()) {
            $this->afterValidationFails();

            return back();
        }

        if ($this->validator->passes()) {
            $this->afterValidationPasses();
        }
    }

    protected function prepareForValidation()
    {
        //
    }

    protected function afterValidationPasses()
    {
        //
    }

    protected function afterValidationFails()
    {
        //
    }

    public function messages()
    {
        return [];
    }

    public function rules()
    {
        return [];
    }
}
