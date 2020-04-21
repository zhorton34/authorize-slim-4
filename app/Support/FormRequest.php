<?php

namespace App\Support;

class FormRequest extends RequestInput
{
    protected $validator;

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
            return $this->afterValidationPasses();
        }

        $this->afterValidation();
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

    protected function afterValidation()
    {
        //
    }

    public function validator()
    {
        return $this->validator;
    }

    public function failed() : bool
    {
        return $this->validator()->fails();
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
