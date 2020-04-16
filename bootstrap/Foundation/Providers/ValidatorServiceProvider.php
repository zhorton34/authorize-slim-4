<?php


namespace Boot\Foundation\Providers;


use Boot\Foundation\Http\ValidatorFactory;
use Illuminate\Translation\Translator;

class ValidatorServiceProvider extends SlimServiceProvider
{
    public function register()
    {
        $this->bind(ValidatorFactory::class, fn (Translator $translator) => new ValidatorFactory($translator));
    }
}
