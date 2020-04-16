<?php

namespace Boot\Foundation\Providers;

use App\Providers\ServiceProvider;
use Illuminate\Translation\Translator;
use Boot\Foundation\Http\ValidatorFactory;

class ValidatorServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->bind(ValidatorFactory::class, fn (Translator $translator) => new ValidatorFactory($translator));
    }

    public function boot()
    {

    }
}
