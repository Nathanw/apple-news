<?php

namespace Urbania\AppleNews\Format;

use Carbon\Carbon;
use Urbania\AppleNews\Assert;

/**
 * The object for defining space around the content in a table cell.
 *
 * @see https://developer.apple.com/documentation/apple_news/padding
 */
class Padding
{
    /**
     * The amount of padding between the bottom of the cell and the content,
     * as an integer in points or using the available units for components.
     * See Specifying Measurements for Components.
     * @var string|integer
     */
    protected $bottom;

    /**
     * The amount of padding between the left side of the cell and the
     * content, as an integer in points or using the available units for
     * components.See Specifying Measurements for Components.
     * @var string|integer
     */
    protected $left;

    /**
     * The amount of padding between the right side of the cell and the
     * content, as an integer in points or using the available units for
     * components.See Specifying Measurements for Components.
     * @var string|integer
     */
    protected $right;

    /**
     * The amount of padding between the top of the cell and the content, as
     * an integer in points or using the available units for components.See
     * Specifying Measurements for Components.
     * @var string|integer
     */
    protected $top;

    public function __construct(array $data = [])
    {
        if (isset($data['bottom'])) {
            $this->setBottom($data['bottom']);
        }

        if (isset($data['left'])) {
            $this->setLeft($data['left']);
        }

        if (isset($data['right'])) {
            $this->setRight($data['right']);
        }

        if (isset($data['top'])) {
            $this->setTop($data['top']);
        }
    }

    /**
     * Get the bottom
     * @return string|integer
     */
    public function getBottom()
    {
        return $this->bottom;
    }

    /**
     * Get the left
     * @return string|integer
     */
    public function getLeft()
    {
        return $this->left;
    }

    /**
     * Get the right
     * @return string|integer
     */
    public function getRight()
    {
        return $this->right;
    }

    /**
     * Get the top
     * @return string|integer
     */
    public function getTop()
    {
        return $this->top;
    }

    /**
     * Set the bottom
     * @param string|integer $bottom
     * @return $this
     */
    public function setBottom($bottom)
    {
        Assert::isSupportedUnits($bottom);

        $this->bottom = $bottom;
        return $this;
    }

    /**
     * Set the left
     * @param string|integer $left
     * @return $this
     */
    public function setLeft($left)
    {
        Assert::isSupportedUnits($left);

        $this->left = $left;
        return $this;
    }

    /**
     * Set the right
     * @param string|integer $right
     * @return $this
     */
    public function setRight($right)
    {
        Assert::isSupportedUnits($right);

        $this->right = $right;
        return $this;
    }

    /**
     * Set the top
     * @param string|integer $top
     * @return $this
     */
    public function setTop($top)
    {
        Assert::isSupportedUnits($top);

        $this->top = $top;
        return $this;
    }

    /**
     * Get the object as array
     * @return array
     */
    public function toArray()
    {
        return [
            'bottom' => is_object($this->bottom)
                ? $this->bottom->toArray()
                : $this->bottom,
            'left' => is_object($this->left)
                ? $this->left->toArray()
                : $this->left,
            'right' => is_object($this->right)
                ? $this->right->toArray()
                : $this->right,
            'top' => is_object($this->top) ? $this->top->toArray() : $this->top
        ];
    }
}
