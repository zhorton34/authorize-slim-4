<?php

namespace App\Support;

use Jenssegers\Blade\Blade;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ResponseFactoryInterface;

class View
{
    public $blade;
    public $response;

    public function __construct(ResponseFactoryInterface $factory, Blade $blade)
    {
        $this->blade = $blade;
        $this->response = $factory->createResponse(200, 'Success');
    }

    public function __invoke(string $template = '', array $with = []) : ResponseInterface
    {
        $this->response->getBody()->write($this->blade->make($template, $with)->render());

        return $this->response;
    }
}
