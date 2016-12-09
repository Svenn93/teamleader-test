<?php
namespace App\Repository;

use App\Object\Order;
use App\Object\Product;

class OrderRepository
{
    function __construct()
    {
        // This is a mock repository
    }

    /**
     * IRL, this would do a DB call
     *
     * @param $id
     * @return Order|null
     */
    public function findById($id)
    {
        switch ($id) {
            case 1:
                $items = [
                    new Product("B102", 10, 4.99, 49.90, 2)
                ];

                return new Order(1, 1, $items, 49.90);
                break;
            case 2:
                $items = [
                    new Product("B102", 5, 4.99, 24.95, 2)
                ];

                return new Order(2, 2, $items, 24.95);
                break;
            case 3:
                $items = [
                    new Product("A101", 2, 9.75, 19.50, 1),
                    new Product("A102", 1, 49.50, 49.50, 1),
                ];

                return new Order(3, 3, $items, 69.00);
                break;
        }

        return null;
    }
}
