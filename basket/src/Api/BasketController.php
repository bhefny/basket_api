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

    public function index(Request $request, Response $response, array $args)
    {
      try {
        $user = $this->getUserFromCookie($request);
        $basket_id = $this->getOrCreateBasket($user['id']);

      } catch (\Exception $e) {
        return $this->returnJsonError($response, $e->getMessage(), $e->getCode());
      }

      $products = $this->db->query("SELECT * FROM basket_products WHERE basket_id='{$basket_id}'")->fetchAll();

      return $response->withJson($products);
    }

    public function show(Request $request, Response $response, array $args)
    {
      try {
        $user = $this->getUserFromCookie($request);

        $basket = $this->getBasketFromUser($user['id'], $args['id']);

      } catch (\Exception $e) {
        return $this->returnJsonError($response, $e->getMessage(), $e->getCode());
      }

      $products = $this->db->query("SELECT * FROM basket_products WHERE basket_id='{$basket['id']}'")->fetchAll();

      return $response->withJson($products);
    }


    public function update(Request $request, Response $response){
      try {
        $user = $this->getUserFromCookie($request);

        $product = $this->getProduct($request->getParam('product_id'));

        $basket_id = $this->getOrCreateBasket($user['id']);

        $existing_product = $this
                              ->db
                              ->query("SELECT * FROM basket_products WHERE basket_id='{$basket_id}' AND product_id='{$product['id']}'")
                              ->fetch();
        if (!$existing_product) {
          $req = $this->db->prepare("INSERT INTO basket_products (basket_id, product_id) VALUES (?, ?)");
          $req->execute(array($basket_id, $product['id']));
        }

      } catch (\Exception $e) {
        return $this->returnJsonError($response, $e->getMessage(), $e->getCode());
      }

      $products = $this->db->query("SELECT * FROM basket_products WHERE basket_id='{$basket_id}'")->fetchAll();
      return $response->withJson($products);
    }

}
