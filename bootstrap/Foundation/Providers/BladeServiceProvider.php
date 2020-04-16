<?php

namespace Boot\Foundation\Providers;

use Jenssegers\Blade\Blade;

class BladeServiceProvider extends SlimServiceProvider
{
    public $blade;

    public function beforeRegistering()
    {
        $this->blade = $this->app->resolve(Blade::class);

        $blade = &$this->blade;

        if (method_exists($this, 'directives'))
        {
            $this->directives($blade);
        }

        $this->app->bind(Blade::class, $blade);

        $this->blade = $this->app->resolve(Blade::class);
    }
}
