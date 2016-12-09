<?php
namespace App\Controller;

use App\Repository\CustomerRepository;
use App\Repository\OrderRepository;
use App\Service\DiscountService;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

class DiscountController
{
    /**
     * @var DiscountService
     */
    private $discountService;

    /**
     * @var CustomerRepository
     */
    private $customerRepository;

    /**
     * @var OrderRepository
     */
    private $orderRepository;

    /**
     * DiscountController constructor.
     * @param DiscountService $discountService
     * @param CustomerRepository $customerRepository
     * @param OrderRepository $orderRepository
     */
    function __construct($discountService, $customerRepository, $orderRepository)
    {
        $this->discountService = $discountService;
        $this->customerRepository = $customerRepository;
        $this->orderRepository = $orderRepository;
    }

    /**
     * Calculates the discount
     *
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function calculate(Request $request, Response $response)
    {
        // Get the user and the order from the request
        $orderId = isset($request->getQueryParams()['orderId']) ? intval($request->getQueryParams()['orderId']) : null;
        $customerId = isset($request->getQueryParams()['customerId']) ? intval($request->getQueryParams()['customerId']) : null;

        $order = $this->orderRepository->findById(intval($orderId));
        $customer = $this->customerRepository->findById(intval($customerId));

        if (empty($order) && empty($customer)) {
            $response->getBody()->write('Customer and order can not be null.');
            return $response;
        }

        // New discount service
        $discounts = $this->discountService->calculateDiscounts($customer, $order);

        // Convert to json for this example, so the output is nicer
        // IRL, we would probably use the value objects
        $results = [];
        foreach ($discounts as $discount) {
            $results[] = $discount->jsonSerialize();
        }

        $response = $response->withHeader('Content-Type', 'application/json');
        $response->getBody()->write(json_encode($results));
        return $response;
    }
}
