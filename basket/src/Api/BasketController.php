<?php

namespace Api;

use Interop\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class BasketController extends BaseApi
{
    public function __construct(ContainerInterface $container)
    {
        $this->logger = $container->logger;
        $this->db = $container->get('db');
    }

    public function show(Request $request, Response $response, array $args)
    {
      try {
        $user = $this->getUserFromCookie($request);
        $this->logger->info("------------user: ".var_export($user, true));

        $basket = $this->getBasketFromUser($user['id'], $args['id']);
        $this->logger->info("------------basket: ".var_export($basket, true));

      } catch (\Exception $e) {
        return $this->returnJsonError($response, $e->getMessage(), $e->getCode());
      }

      $products = $this->db->query("SELECT * FROM basket_products WHERE basket_id='{$basket['id']}'")->fetchAll();


//         $token = $request->getCookieParam('my_token');
        // $user = $this->db->query("SELECT * FROM users WHERE token='$token'")->fetch();

// // $statement = $db->prepare("select id from some_table where name = :name");
// // $statement->execute(array(':name' => "Jimbo"));
// // $row = $statement->fetch();

//         if (is_null($user)) {
//             return $response->withJson([], 401);
//         }

//         $basket = $this->db->query("")->fetch();

        // $data=['a' => $f];

        return $response->withJson($products);
    }


}
