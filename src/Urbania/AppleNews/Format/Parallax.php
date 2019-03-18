<?php

namespace Urbania\AppleNews\Format;

use Carbon\Carbon;
use Urbania\AppleNews\Assert;

/**
 * The behavior whereby a component moves at a speed different from the
 * scroll speed.
 *
 * @see https://developer.apple.com/documentation/apple_news/parallax
 */
class Parallax extends Behavior
{
    /**
     * The speed of the component, as a factor of the scroll speed.The value
     * of factor must be between 0.5 and 2.0. Values outside this range will
     * be reset to the minimum or maximum value.
     * @var integer|float
     */
    protected $factor;

    /**
     * This behavior’s type is always parallax.
     * @var string
     */
    protected $type = 'parallax';

    public function __construct(array $data = [])
    {
        parent::__construct($data);

        if (isset($data['factor'])) {
            $this->setFactor($data['factor']);
        }
    }

    /**
     * Get the factor
     * @return integer|float
     */
    public function getFactor()
    {
        return $this->factor;
    }

    /**
     * Get the type
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the factor
     * @param integer|float $factor
     * @return $this
     */
    public function setFactor($factor)
    {
        Assert::number($factor);

        $this->factor = $factor;
        return $this;
    }

    /**
     * Get the object as array
     * @return array
     */
    public function toArray()
    {
        return array_merge(parent::toArray(), [
            'factor' => $this->factor,
            'type' => $this->type
        ]);
    }
}
