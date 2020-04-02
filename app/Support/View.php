<?php

namespace App\Support;

use Jenssegers\Blade\Blade;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class View
{
    public $response;

    public function __construct(ResponseFactoryInterface $factory)
    {
        $this->response = $factory->createResponse(200, 'Success');
    }

    public function __invoke(string $template = '', array $with = []) : ResponseInterface
    {
        $this->response->getBody()->write(
            (new Blade(config('blade.views'), config('blade.cache')))
                ->make($template, $with)
                ->render()
        );

        return $this->response;
    }
}
