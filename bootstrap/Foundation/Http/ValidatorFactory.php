<?php

namespace Boot\Foundation\Http;

use Illuminate\Translation\Translator;
use Illuminate\Validation\Factory;

class ValidatorFactory
{
    protected $factory;

    public function __construct(Translator $translator)
    {
        $this->factory = new Factory($translator);
    }

    public function __call($method, $parameters)
    {
        return call_user_func_array([$this->factory, $method], $parameters);
    }
}
