<?php
namespace App\Object;

class Order
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $customerId;

    /**
     * @var Product[]
     */
    private $items;

    /**
     * @var float;
     */
    private $total;

    /**
     * Order constructor.
     * @param integer $id
     * @param integer $customerId
     * @param Product[] $items
     * @param float $total
     */
    function __construct($id, $customerId, $items, $total)
    {
        $this->id = $id;
        $this->customerId = $customerId;
        $this->items = $items;
        $this->total = $total;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * @return Product[]
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @return float
     */
    public function getTotal()
    {
        return $this->total;
    }
}
