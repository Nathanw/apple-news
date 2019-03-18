<?php

namespace Urbania\AppleNews\Format;

use Carbon\Carbon;
use Urbania\AppleNews\Assert;

/**
 * The object for defining columns, gutters, and margins for your
 * article’s designed width.
 *
 * @see https://developer.apple.com/documentation/apple_news/layout
 */
class Layout implements \JsonSerializable
{
    /**
     * The number of columns this article was designed for. You must have at
     * least one column.
     * @var integer
     */
    protected $columns;

    /**
     * The gutter size for the article (in points). The gutter provides
     * spacing between columns. This property should always be an even
     * number; odd numbers are rounded up to the next even number. If this
     * property is omitted, a default gutter size of 20 is applied. If the
     * gutter is negative, the number will be set to 0.
     * @var integer
     */
    protected $gutter;

    /**
     * The outer (left and right) margins of the article, in points. If this
     * property is omitted, a default article margin of 60 is applied. If the
     * margin is negative, the number will be set to 0. If the margin is
     * greater than or equal to the width/2, the article delivery will fail.
     * @var integer
     */
    protected $margin;

    /**
     * The width (in points) this article was designed for. This property is
     * used to calculate down-scaling scenarios for smaller devices.
     * @var integer
     */
    protected $width;

    public function __construct(array $data = [])
    {
        if (isset($data['columns'])) {
            $this->setColumns($data['columns']);
        }

        if (isset($data['gutter'])) {
            $this->setGutter($data['gutter']);
        }

        if (isset($data['margin'])) {
            $this->setMargin($data['margin']);
        }

        if (isset($data['width'])) {
            $this->setWidth($data['width']);
        }
    }

    /**
     * Get the columns
     * @return integer
     */
    public function getColumns()
    {
        return $this->columns;
    }

    /**
     * Set the columns
     * @param integer $columns
     * @return $this
     */
    public function setColumns($columns)
    {
        Assert::integer($columns);

        $this->columns = $columns;
        return $this;
    }

    /**
     * Get the gutter
     * @return integer
     */
    public function getGutter()
    {
        return $this->gutter;
    }

    /**
     * Set the gutter
     * @param integer $gutter
     * @return $this
     */
    public function setGutter($gutter)
    {
        Assert::integer($gutter);

        $this->gutter = $gutter;
        return $this;
    }

    /**
     * Get the margin
     * @return integer
     */
    public function getMargin()
    {
        return $this->margin;
    }

    /**
     * Set the margin
     * @param integer $margin
     * @return $this
     */
    public function setMargin($margin)
    {
        Assert::integer($margin);

        $this->margin = $margin;
        return $this;
    }

    /**
     * Get the width
     * @return integer
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set the width
     * @param integer $width
     * @return $this
     */
    public function setWidth($width)
    {
        Assert::integer($width);

        $this->width = $width;
        return $this;
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
        $data = [];
        if (isset($this->columns)) {
            $data['columns'] = $this->columns;
        }
        if (isset($this->gutter)) {
            $data['gutter'] = $this->gutter;
        }
        if (isset($this->margin)) {
            $data['margin'] = $this->margin;
        }
        if (isset($this->width)) {
            $data['width'] = $this->width;
        }
        return $data;
    }
}
