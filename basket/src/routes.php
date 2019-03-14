<?php

use Api\BasketController;
use Slim\Http\Request;
use Slim\Http\Response;


// Api Routes
$app->group('/api',
  function () {
    $this->get('/basket/{id}', BasketController::class . ':show')->setName('basket.show');
    $this->post('/basket', BasketController::class . ':create')->setName('basket.create');
});


// Routes

$app->get('/[{name}]', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");
    // $thiś->db
    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});
