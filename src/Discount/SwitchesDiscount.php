<?php
namespace App\Discount;

use App\Enum\Discount\Type;
use App\Object\Customer;
use App\Object\Discount;
use App\Object\Order;

class SwitchesDiscount implements DiscountInterface
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
        foreach ($order->getItems() as $item) {
            if ($item->getCategory() !== 2) {
                continue;
            }

            if ($item->getQuantity() >= 5) {
                return true;
            }
        }

        return false;
    }

    /**
     * Calculates the discount
     *
     * @param Customer $customer
     * @param Order $order
     * @return Discount|Discount[]
     */
    public function calculate(Customer $customer, Order $order)
    {
        $amountOfDiscounts = 0;
        foreach ($order->getItems() as $item) {
            if ($item->getCategory() !== 2) {
                continue;
            }

            $amountOfDiscounts += floor($item->getQuantity() / 5);
        }

        $discounts = [];
        for ($i = 1; $i <= $amountOfDiscounts; $i++) {
            $discounts = new Discount(Type::GROUP_DISCOUNT_SWITCHES, "Switches discount, add one free product to the order", null);
        }

        return $discounts;
    }
}
