<?php

namespace Urbania\AppleNews\Format;

use Carbon\Carbon;
use Urbania\AppleNews\Assert;

/**
 * Define and provide data records that fit within the structure defined
 * by descriptors for a data table.
 *
 * @see https://developer.apple.com/documentation/apple_news/recordstore/records
 */
class Records
{
    public function __construct(array $data = [])
    {
    }

    /**
     * Get the object as array
     * @return array
     */
    public function toArray()
    {
        return [];
    }
}
