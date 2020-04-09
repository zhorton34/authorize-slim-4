<?php

namespace Boot\Foundation;

use Psr\Container\ContainerInterface;
use Slim\Interfaces\RouteResolverInterface;
use Slim\Interfaces\RouteCollectorInterface;
use Psr\Http\Message\ResponseFactoryInterface;
use Slim\Interfaces\CallableResolverInterface;
use Slim\Interfaces\MiddlewareDispatcherInterface;

class AppFactory extends \Slim\Factory\AppFactory
{
    public static function createFromContainer(ContainerInterface $container) : App
    {
        $responseFactory = $container->has(ResponseFactoryInterface::class)
            ? $container->get(ResponseFactoryInterface::class)
            : self::determineResponseFactory();

        $callableResolver = $container->has(CallableResolverInterface::class)
            ? $container->get(CallableResolverInterface::class)
            : null;

        $routeCollector = $container->has(RouteCollectorInterface::class)
            ? $container->get(RouteCollectorInterface::class)
            : null;

        $routeResolver = $container->has(RouteResolverInterface::class)
            ? $container->get(RouteResolverInterface::class)
            : null;

        $middlewareDispatcher = $container->has(MiddlewareDispatcherInterface::class)
            ? $container->get(MiddlewareDispatcherInterface::class)
            : null;

        return new App(
            $responseFactory,
            $container,
            $callableResolver,
            $routeCollector,
            $routeResolver,
            $middlewareDispatcher
        );
    }
}
