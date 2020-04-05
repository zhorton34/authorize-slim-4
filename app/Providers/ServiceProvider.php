<?php


namespace App\Providers;

use Psr\Container\ContainerInterface;
use Slim\App;

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

    public function bind($key, callable $resolvable)
    {
        $this->container->set($key, $resolvable);
    }

    public function resolve($key)
    {
        return $this->container->get($key);
    }

    final public static function setup(App &$app, array $providers)
    {
        $providers = array_map(fn ($provider) => new $provider($app), $providers);

        array_walk($providers, fn (ServiceProvider $provider) => $provider->register());
        array_walk($providers, fn (ServiceProvider $provider) => $provider->boot());
    }
}
