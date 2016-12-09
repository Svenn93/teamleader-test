<?php
namespace App\Discount;

use App\Object\Customer;
use App\Object\Discount;
use App\Object\Order;

interface DiscountInterface
{
    /**
     * Checks whether a discount can be applied
     *
     * @param Customer $customer
     * @param Order $order
     * @return boolean
     */
    public function applies(Customer $customer, Order $order);

    /**
     * Calculates the discount when the rule does apply
     *
     * @param Customer $customer
     * @param Order $order
     * @return Discount|Discount[]
     */
    public function calculate(Customer $customer, Order $order);
}
