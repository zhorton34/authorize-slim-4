<?php

namespace Boot\Foundation\Bootstrappers;

class Bootstrapper
{
    public $app;
    public $kernel;

    final public function __construct(&$app, &$kernel)
    {
        $this->app = $app;
        $this->kernel = $kernel;
    }

    final public static function setup(&$app, &$kernel, array $bootstrappers)
    {
        collect($bootstrappers)
            ->map(fn ($bootstrapper) => new $bootstrapper($app, $kernel))
            ->each(fn (Bootstrapper $bootstrapper) => $bootstrapper->beforeBoot())
            ->each(fn (Bootstrapper $bootstrapper) => $bootstrapper->boot())
            ->each(fn (Bootstrapper $bootstrapper) => $bootstrapper->afterBoot());
    }

    public function beforeBoot()
    {
        //
    }

    public function boot()
    {
        //
    }

    public function afterBoot()
    {
        //
    }
}
