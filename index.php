<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

$app = new \Slim\App;

$app->get('/test', function (Request $request, Response $response) {
    $response = $response->withHeader('Content-type', 'application/json');
    $response->getBody()->write(json_encode('Hello world'));

    return $response;
});
$app->run();