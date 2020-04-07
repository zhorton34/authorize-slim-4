<?php


namespace App\Providers;

use Boot\Foundation\App;
use Psr\Container\ContainerInterface;

abstract class ServiceProvider
{
    public App $app;
    public ContainerInterface $container;

    final public function __construct(App &$app)
    {
        $this->app = $app;
        $this->container = $this->app->getContainer();
    }

    abstract public function register();
    abstract public function boot();

    public function bind($key, callable $resolve)
    {
        return $this->app->bind($key, $resolve);
    }

    public function resolve($key)
    {
        return $this->container->get($key);
    }

    final public static function setup(App &$app, array $providers)
    {
        collect($providers)
            ->map(fn ($provider) => new $provider($app))
            ->each(fn (ServiceProvider $provider) => $provider->register())
            ->each(fn (ServiceProvider $provider) => $provider->boot());
    }
}
