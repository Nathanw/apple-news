<?php

namespace Urbania\AppleNews\Format;

use Carbon\Carbon;
use Urbania\AppleNews\Assert;

/**
 * Properties shared by all types of component additions.
 *
 * @see https://developer.apple.com/documentation/apple_news/componentaddition
 */
class ComponentAddition
{
    /**
     * The type of componentAddition. For example ComponentLink.
     * @var string
     */
    protected $type;

    public function __construct(array $data = [])
    {
        if (isset($data['type'])) {
            $this->setType($data['type']);
        }
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
     * Set the type
     * @param string $type
     * @return $this
     */
    public function setType($type)
    {
        Assert::string($type);

        $this->type = $type;
        return $this;
    }

    /**
     * Get the object as array
     * @return array
     */
    public function toArray()
    {
        return [
            'type' => $this->type
        ];
    }
}
