<?php

namespace Urbania\AppleNews\Format;

use Carbon\Carbon;
use Urbania\AppleNews\Assert;

/**
 * An object containing text style objects that can be referred to inline
 * in text.
 *
 * @see https://developer.apple.com/documentation/apple_news/articledocument/textstyles
 */
class TextStyles implements \JsonSerializable
{
    /**
     * A text style, with a name you define that can be referred to by
     * components within this document.
     * @var array
     */
    protected $styles;

    public function __construct(array $data = [])
    {
        $this->setStyles($data);
    }

    /**
     * Get the styles
     * @return array
     */
    public function getStyles()
    {
        return $this->styles;
    }

    /**
     * Set the styles
     * @param array $styles
     * @return $this
     */
    public function setStyles($styles)
    {
        Assert::isMap($styles);
        Assert::allIsInstanceOfOrArray($styles, TextStyle::class);

        $items = [];
        foreach ($styles as $key => $item) {
            $items[$key] = is_array($item) ? new TextStyle($item) : $item;
        }
        $this->styles = $items;
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
        $styles = [];
        foreach ($this->styles as $key => $style) {
            $styles[$key] = !is_null($style) ? $style->toArray() : null;
        }
        return $styles;
    }
}
