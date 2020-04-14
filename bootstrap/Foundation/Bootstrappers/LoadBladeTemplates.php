<?php

namespace Boot\Foundation\Bootstrappers;

use Illuminate\Support\Str;
use Jenssegers\Blade\Blade;

class LoadBladeTemplates extends Bootstrapper
{
    public function boot()
    {
        $blade = (new Blade(config('blade.views'), config('blade.cache')));

        app()->bind(Blade::class, $blade);
    }
}
