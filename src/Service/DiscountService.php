<?php
namespace App\Service;

use App\Discount\DiscountInterface;
use App\Discount\LoyaltyDiscount;
use App\Discount\SwitchesDiscount;
use App\Discount\ToolsDiscount;
use App\Object\Customer;
use App\Object\Discount;
use App\Object\Order;

class DiscountService
{
    /**
     * @var DiscountInterface[]
     */
    private $discountRules;

    function __construct()
    {
        // Note: in real world env, these rules would probably come from a DB or something like that
        $loyaltyDiscount = new LoyaltyDiscount();
        $switchesDiscount = new SwitchesDiscount();
        $toolsDiscount = new ToolsDiscount();

        $this->discountRules = [$loyaltyDiscount, $switchesDiscount, $toolsDiscount];
    }

    /**
     * Calculate which discounts apply to this customer and his order
     *
     * @param Customer $customer
     * @param Order $order
     * @return Discount[]
     */
    public function calculateDiscounts(Customer $customer, Order $order)
    {
        $discounts = [];
        foreach ($this->discountRules as $discount) {
            if (!$discount->applies($customer, $order)) {
                continue;
            }

            $discounts[] = $discount->calculate($customer, $order);
        }

        // Flatten array
        $discounts = array_merge($discounts);

        return $discounts;
    }
}
