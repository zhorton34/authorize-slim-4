<?php

namespace Boot\Foundation;

use DI\Container;
use Invoker\Invoker;
use DI\Bridge\Slim\Bridge;
use DI\Bridge\Slim\CallableResolver;
use DI\Bridge\Slim\ControllerInvoker;
use Psr\Container\ContainerInterface;
use Invoker\ParameterResolver\ResolverChain;
use Slim\Interfaces\CallableResolverInterface;
use Invoker\ParameterResolver\DefaultValueResolver;
use Invoker\ParameterResolver\AssociativeArrayResolver;
use Invoker\CallableResolver as InvokerCallableResolver;
use Invoker\ParameterResolver\Container\TypeHintContainerResolver;

class AppFactoryBridge extends Bridge
{
    public static function create(ContainerInterface $container = null): App
    {
        $container = $container ?: new Container;

        $callableResolver = new InvokerCallableResolver($container);

        $container->set(CallableResolverInterface::class, new CallableResolver($callableResolver));
        $app = AppFactory::createFromContainer($container);

        $container->set(App::class, $app);

        $controllerInvoker = self::createControllerInvoker($container);
        $app->getRouteCollector()->setDefaultInvocationStrategy($controllerInvoker);

        return $app;
    }

    private static function createControllerInvoker(ContainerInterface $container): ControllerInvoker
    {
        $resolvers = [
            // Inject parameters by name first
            new AssociativeArrayResolver(),
            // Then inject services by type-hints for those that weren't resolved
            new TypeHintContainerResolver($container),
            // Then fall back on parameters default values for optional route parameters
            new DefaultValueResolver(),
        ];

        $invoker = new Invoker(new ResolverChain($resolvers), $container);

        return new ControllerInvoker($invoker);
    }
}
