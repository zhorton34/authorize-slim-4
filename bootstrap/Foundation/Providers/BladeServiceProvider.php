<?php

namespace Boot\Foundation\Providers;

use App\Providers\ServiceProvider;
use Jenssegers\Blade\Blade;

class BladeServiceProvider extends ServiceProvider
{
    public $blade;

    public function beforeRegistering()
    {
        $this->blade = $this->app->resolve(Blade::class);

        $blade = &$this->blade;

        $this->directives($blade);

        $this->app->bind(Blade::class, $blade);

        $this->blade = $this->app->resolve(Blade::class);
    }

    public function directives(Blade $blade)
    {
        // register blade directives
    }

    public function register()
    {

    }

    public function boot()
    {

    }
}
