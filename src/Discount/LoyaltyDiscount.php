<?php
namespace App\Discount;

use App\Enum\Discount\Type;
use App\Object\Customer;
use App\Object\Discount;
use App\Object\Order;

class LoyaltyDiscount implements DiscountInterface
{
    /**
     * Checks whether this discount applies
     *
     * @param Customer $customer
     * @param Order $order
     * @return bool
     */
    public function applies(Customer $customer, Order $order)
    {
        // Customer didn't spend more than 1000 euros in the past, stop right there
        if ($customer->getRevenue() <= 1000) {
            return false;
        }

        return true;
    }

    /**
     * Calculates the discount
     *
     * @param Customer $customer
     * @param Order $order
     * @return Discount
     */
    public function calculate(Customer $customer, Order $order)
    {
        // Take 10% from the total order value
        $amount = $order->getTotal() * 0.1;

        // Create a new Discount object
        $result = new Discount(Type::LOYALTY_DISCOUNT, "Loyalty discount, user ordered more than 1000 euros.", $amount);

        return $result;
    }
}
