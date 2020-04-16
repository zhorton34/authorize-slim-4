<?php

namespace Boot\Foundation\Providers;

use Psr\Container\ContainerInterface;

abstract class SlimServiceProvider
{
    public $app;
    public ContainerInterface $container;

    final public function __construct(&$app)
    {
        $this->app = $app;
        $this->container = $this->app->getContainer();

        if (method_exists($this, 'beforeRegistering'))
        {
            $this->beforeRegistering();
        }
    }

    public function bind($key, callable $resolvable)
    {
        $this->container->set($key, $resolvable);
    }

    public function resolve($key)
    {
        return $this->container->get($key);
    }

    final public static function setup(&$app, array $providers)
    {
        $run_when_exists = fn ($provider, $method) => method_exists($provider, $method)
            ? $provider->$method()
            : null;

        collect($providers)
            ->map(fn ($provider) => new $provider($app))
            ->each(fn (SlimServiceProvider $provider) => $run_when_exists($provider, 'register'))
            ->each(fn (SlimServiceProvider $provider) => $run_when_exists($provider, 'boot'));
    }
}
