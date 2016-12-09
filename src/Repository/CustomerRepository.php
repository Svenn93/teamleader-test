<?php
namespace App\Repository;

use App\Object\Customer;

class CustomerRepository
{
    function __construct()
    {
        // This is a mock repository
    }

    /**
     * IRL, this would do a DB call
     *
     * @param $id
     * @return Customer|null
     */
    public function findById($id)
    {
        switch ($id) {
            case 1:
                return new Customer(1, "Coca-Cola", new \DateTime("2014-06-28"), 492.12);
                break;
            case 2:
                return new Customer(2, "Teamleader", new \DateTime("2015-01-15"), 1505.95);
                break;
            case 3:
                return new Customer(3, "Jeroen De Wit", new \DateTime("2016-02-11"), 0.00);
                break;
        }

        return null;
    }
}
