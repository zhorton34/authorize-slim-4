<?php

namespace Boot\Foundation\Http;

use Illuminate\Validation\Factory;
use Illuminate\Translation\Translator;

class ValidatorFactory
{
    protected $factor;

    public function __construct(Translator $translator)
    {
        $this->factory = new Factory($translator);
    }

    public function __call($method, $parameters)
    {
        return call_user_func_array([$this->factory, $method], $parameters);
    }
}
