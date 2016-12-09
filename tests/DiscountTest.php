<?php

use App\Enum\Discount\Type;
use \App\Object\Discount;
use \App\Discount\SwitchesDiscount;
use App\Object\Product;
use App\Object\Order;
use App\Object\Customer;

class DiscountServiceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var SwitchesDiscount
     */
    private $switchesDiscount;

    public function setUp() {
        parent::setUp();

        $this->switchesDiscount = new SwitchesDiscount();
    }

    /**
     * Test the switches discount calculate
     */
    public function testSwitchesDiscount() {
        $expectedResult = new Discount(Type::GROUP_DISCOUNT_SWITCHES, "Switches discount, add one free product to the order", null);

        $items = [
            new Product("B102", 10, 4.99, 49.90, 2)
        ];

        $order = new Order(1, 1, $items, 49.90);
        $customer = new Customer(1, "Coca-Cola", new \DateTime("2014-06-28"), 492.12);

        $result = $this->switchesDiscount->calculate($customer, $order);

        $this->assertEquals($expectedResult, $result);
    }
}
