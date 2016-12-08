<?php
namespace CodingTest\Service;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

class DiscountService
{
    private $discountRules;

    function __construct()
    {
        $this->discountRules = [];
    }

    /**
     * Calculate the discounts based on a user and his current order
     *
     * @param Request $request
     * @param Response $response
     */
    public function calculateDiscounts(Request $request, Response $response)
    {

    }
}