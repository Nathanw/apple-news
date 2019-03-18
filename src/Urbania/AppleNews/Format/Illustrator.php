<?php

namespace Urbania\AppleNews\Format;

use Carbon\Carbon;
use Urbania\AppleNews\Assert;

/**
 * The component for adding illustrator credit.
 *
 * @see https://developer.apple.com/documentation/apple_news/illustrator
 */
class Illustrator extends Text
{
    /**
     * This component always has a role of illustrator.
     * @var string
     */
    protected $role = 'illustrator';

    public function __construct(array $data = [])
    {
        parent::__construct($data);
    }

    /**
     * Get the role
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Get the object as array
     * @return array
     */
    public function toArray()
    {
        return array_merge(parent::toArray(), [
            'role' => $this->role
        ]);
    }
}
