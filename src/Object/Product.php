<?php
namespace App\Object;

class Product
{
    /**
     * @var string
     */
    private $productId;

    /**
     * @var integer;
     */
    private $quantity;

    /**
     * @var float
     */
    private $unitPrice;

    /**
     * @var float
     */
    private $total;

    /**
     * @var int
     */
    private $category;

    /**
     * Product constructor.
     * @param string $productId
     * @param integer $quantity
     * @param float $unitPrice
     * @param float $total
     * @param integer $category
     */
    function __construct($productId, $quantity, $unitPrice, $total, $category)
    {
        $this->productId = $productId;
        $this->quantity = $quantity;
        $this->unitPrice = $unitPrice;
        $this->total = $total;
        $this->category = $category;
    }

    /**
     * @return string
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @return float
     */
    public function getUnitPrice()
    {
        return $this->unitPrice;
    }

    /**
     * @return float
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @return int
     */
    public function getCategory()
    {
        return $this->category;
    }
}