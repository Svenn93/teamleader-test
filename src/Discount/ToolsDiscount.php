<?php
namespace App\Discount;

use App\Enum\Discount\Type;
use App\Object\Customer;
use App\Object\Discount;
use App\Object\Order;
use App\Object\Product;

class ToolsDiscount implements DiscountInterface
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
        // Filter out the products of category Tools
        $items = array_filter($order->getItems(), function (Product $item) {
            return $item->getCategory() == 1;
        });

        $amountOfItems = 0;
        foreach ($items as $item) {
            $amountOfItems += $item->getQuantity();

            // Early return
            if ($amountOfItems >= 2) {
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
        // Filter out the products of category Tools
        $items = array_filter($order->getItems(), function (Product $item) {
            return $item->getCategory() == 1;
        });

        // get an array of prices
        $prices = array_map(function (Product $item) {
            return $item->getUnitPrice();
        }, $items);

        // get the cheapest one and calculate the discount
        $lowest = min($prices);
        $amount = $lowest * 0.2;

        return new Discount(Type::GROUP_DISCOUNT_TOOLS, "Bought more than 1 product of this category, cheapest gets 20% reduction", $amount);
    }
}
