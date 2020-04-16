<?php

namespace Boot\Foundation\Bootstrappers;

use Jenssegers\Blade\Blade;

class LoadBladeTemplates extends Bootstrapper
{
    public function boot()
    {
        $blade = new Blade(
            config('blade.views'),
            config('blade.cache')
        );

        $this->app->bind(Blade::class, $blade);
    }

}
