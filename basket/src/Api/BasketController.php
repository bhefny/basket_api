<?php

namespace Api;

use Interop\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class BasketController
{
    public function __construct(ContainerInterface $container)
    {
        $this->db = $container->get('db');
    }

    public function show(Request $request, Response $response)
    {
        return $response->withJson(['user' => $request->getQueryParams()]);
    }
}
