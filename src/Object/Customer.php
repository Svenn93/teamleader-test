<?php
namespace App\Object;

class Customer
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var \DateTime
     */
    private $since;

    /**
     * @var float
     */
    private $revenue;

    /**
     * Customer constructor.
     * @param int $id
     * @param string $name
     * @param \DateTime $since
     * @param float $revenue
     */
    function __construct($id, $name, $since, $revenue)
    {
        $this->id = $id;
        $this->name = $name;
        $this->since = $since;
        $this->revenue = $revenue;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return \DateTime
     */
    public function getSince()
    {
        return $this->since;
    }

    /**
     * @return float
     */
    public function getRevenue()
    {
        return $this->revenue;
    }
}
