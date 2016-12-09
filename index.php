<?php
$loader = require 'vendor/autoload.php';
$loader->add('App\\', __DIR__.'/src/');

$app = new \Slim\App;

$container = $app->getContainer();
$container['errorHandler'] = function ($container) {
    return function ($request, $response, $exception) use ($container) {
        return $container['response']->withStatus(500)
            ->withHeader('Content-Type', 'text/html')
            ->write($exception);
    };
};

$container['\App\Controller\DiscountController'] = function ($container) {
    $discountService = new \App\Service\DiscountService();
    $customerRepository = new \App\Repository\CustomerRepository();
    $orderRepository = new \App\Repository\OrderRepository();
    return new \App\Controller\DiscountController(
        $discountService,
        $customerRepository,
        $orderRepository
    );
};

$app->get('/discount/calculate', '\App\Controller\DiscountController:calculate');

$app->run();