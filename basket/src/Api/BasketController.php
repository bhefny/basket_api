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
        $token = $request->getParam('token');
        $user = $this->db->query("SELECT * FROM users WHERE token='$token'")->fetch();

        if (is_null($user)) {
            return $response->withJson([], 401);
        }



        $data=['a' => $user['id']];
        return $response->withJson($data);
    }


}
