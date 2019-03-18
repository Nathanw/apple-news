<?php

namespace Urbania\AppleNews\Format;

use Carbon\Carbon;
use Urbania\AppleNews\Assert;

/**
 * The behavior whereby a component acts as if it is on a short spring.
 *
 * @see https://developer.apple.com/documentation/apple_news/springy
 */
class Springy extends Behavior implements \JsonSerializable
{
    /**
     * This behavior’s type is always springy.
     * @var string
     */
    protected $type = 'springy';

    public function __construct(array $data = [])
    {
        parent::__construct($data);
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
     * Convert the object into something JSON serializable.
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }

    /**
     * Convert the instance to JSON.
     * @param  int  $options
     * @return string
     */
    public function toJson(int $options = 0)
    {
        return json_encode($this->jsonSerialize(), $options);
    }

    /**
     * Get the object as array
     * @return array
     */
    public function toArray()
    {
        $data = parent::toArray();
        if (isset($this->type)) {
            $data['type'] = $this->type;
        }
        return $data;
    }
}
