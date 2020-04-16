<?php

namespace Boot\Foundation\Providers;

use Psr\Container\ContainerInterface;

abstract class ServiceProvider
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
        collect($providers)->map(fn ($provider) => new $provider($app))
            ->each(fn (ServiceProvider $provider) => $provider->register())
            ->each(fn (ServiceProvider $provider) => $provider->boot());
    }
}
