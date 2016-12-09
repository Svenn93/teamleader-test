<?php
namespace App\Object;

use App\Enum\Discount\Type;

class Discount implements \JsonSerializable
{
    /**
     * @var Type
     */
    private $type;

    /**
     * @var string
     */
    private $reason;

    /**
     * @var float|null
     */
    private $value;

    /**
     * Discount constructor.
     * @param int $type
     * @param string $reason
     * @param float|null $value
     */
    function __construct($type, $reason, $value = null)
    {
        $this->type = $type;
        $this->reason = $reason;
        $this->value = $value;
    }

    /**
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * @return float
     */
    public function getValue()
    {
        return $this->value;
    }

    public function jsonSerialize()
    {
        $vars = get_object_vars($this);
        return $vars;
    }
}
