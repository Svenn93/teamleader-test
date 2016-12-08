<?php
namespace CodingTest\Service;

class DiscountService
{
    public $discountRules;

    function __construct()
    {
        $this->discountRules = [];
    }

    /**
     * Calculates the discount for this user based on his current order
     *
     * @param $user
     * @param $order
     */
    public function calculateDiscount($user, $order)
    {

    }
}