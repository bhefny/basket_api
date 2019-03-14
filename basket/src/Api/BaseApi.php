<?php

namespace Api;

// use Interop\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class BaseApi
{

  protected function getUserFromCookie(Request $request)
  {
    $token = $request->getCookieParam('my_basket_token');
    $user = $this->db->query("SELECT * FROM users WHERE token='$token'")->fetch();

    if (!$user) {
      throw new \Exception('User not found', 404);
    }

    return $user;
  }

  protected function getBasketFromUser($user_id, $basket_id){
    $basket = $this->db->query("SELECT * FROM baskets WHERE id='$basket_id' AND user_id='$user_id'")->fetch();

    if (!$basket) {
      throw new \Exception('Basket not found', 404);
    }

    return $basket;
  }

  protected function getProduct($product_id){
    $product = $this->db->query("SELECT * FROM products WHERE id='{$product_id}'")->fetch();

    if (!$product) {
      throw new \Exception('Product not found', 404);
    }

    return $product;
  }

  protected function getOrCreateBasket($user_id){
    $basket = $this->db->query("SELECT * FROM baskets WHERE user_id='{$user_id}'")->fetch();
    if (!$basket) {
      $req = $this->db->prepare("INSERT INTO baskets (user_id) VALUES ('{$user_id}')");
      $req->execute(array($user_id));
      $basket_id = $this->db->lastInsertId();
    }
    else{
      $basket_id = $basket['id'];
    }

    return $basket_id;
  }

  protected function returnJsonError(Response $response, $msg='', $code)
  {
    return $response->withJson(['error' => $msg], $code);
  }

}
