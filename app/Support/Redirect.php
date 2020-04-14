<?php


namespace App\Support;

use Psr\Http\Message\ResponseFactoryInterface;

class Redirect
{
    protected $response;

    public function __construct(ResponseFactoryInterface $factory)
    {
        $this->response = $factory->createResponse(302);
    }

    public function __invoke(string $to)
    {
        $this->response = $this->response->withHeader('Location', $to);

        return $this->response;
    }
}
