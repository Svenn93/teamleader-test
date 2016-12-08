<?php
namespace CodingTest\Discount;

interface DiscountInterface
{
    /**
     * Checks whether a discount can be applied
     *
     * @param $user
     * @param $order
     * @return boolean
     */
    public function applies($user, $order);
    public function calculate($user, $order);
}