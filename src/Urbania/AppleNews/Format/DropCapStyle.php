<?php

namespace Urbania\AppleNews\Format;

use Carbon\Carbon;
use Urbania\AppleNews\Assert;

/**
 * The object for defining the drop cap text style for use in the first
 * paragraph in a text component.
 *
 * @see https://developer.apple.com/documentation/apple_news/dropcapstyle
 */
class DropCapStyle
{
    /**
     * The background color of the drop cap. By default, no background color
     * is applied, making the background effectively transparent.
     * @var string
     */
    protected $backgroundColor;

    /**
     * The PostScript name of the font to use for the drop cap. By default,
     * the drop cap inherits the font of the component it’s in.
     * @var string
     */
    protected $fontName;

    /**
     * Indicates the number of characters to render in the drop cap style.
     * @var integer
     */
    protected $numberOfCharacters;

    /**
     * Indicates the approximate number of text lines this drop cap should
     * span. For example, if numberOfLines is set to 3, and the top of the
     * drop cap is aligned with the top of the first line, the bottom of the
     * drop cap will drop to the bottom of the third line, although the
     * actual drop amount can vary depending on the device and its
     * orientation.
     * @var integer
     */
    protected $numberOfLines;

    /**
     * Describes the number of text lines this drop cap should raise. For
     * example: When numberOfRaisedLines is 3, and numberOfLines is 5, the
     * top of the drop cap is raised above the first line by 3 lines and and
     * the bottom of the drop cap drops to the bottom of the second line.
     * @var integer
     */
    protected $numberOfRaisedLines;

    /**
     * Sets the padding of the drop cap in points. When padding is applied,
     * the drop cap is smaller than the box that surrounds it.
     * @var integer
     */
    protected $padding;

    /**
     * The color of the drop cap.
     * @var string
     */
    protected $textColor;

    public function __construct(array $data = [])
    {
        if (isset($data['backgroundColor'])) {
            $this->setBackgroundColor($data['backgroundColor']);
        }

        if (isset($data['fontName'])) {
            $this->setFontName($data['fontName']);
        }

        if (isset($data['numberOfCharacters'])) {
            $this->setNumberOfCharacters($data['numberOfCharacters']);
        }

        if (isset($data['numberOfLines'])) {
            $this->setNumberOfLines($data['numberOfLines']);
        }

        if (isset($data['numberOfRaisedLines'])) {
            $this->setNumberOfRaisedLines($data['numberOfRaisedLines']);
        }

        if (isset($data['padding'])) {
            $this->setPadding($data['padding']);
        }

        if (isset($data['textColor'])) {
            $this->setTextColor($data['textColor']);
        }
    }

    /**
     * Get the backgroundColor
     * @return string
     */
    public function getBackgroundColor()
    {
        return $this->backgroundColor;
    }

    /**
     * Get the fontName
     * @return string
     */
    public function getFontName()
    {
        return $this->fontName;
    }

    /**
     * Get the numberOfCharacters
     * @return integer
     */
    public function getNumberOfCharacters()
    {
        return $this->numberOfCharacters;
    }

    /**
     * Get the numberOfLines
     * @return integer
     */
    public function getNumberOfLines()
    {
        return $this->numberOfLines;
    }

    /**
     * Get the numberOfRaisedLines
     * @return integer
     */
    public function getNumberOfRaisedLines()
    {
        return $this->numberOfRaisedLines;
    }

    /**
     * Get the padding
     * @return integer
     */
    public function getPadding()
    {
        return $this->padding;
    }

    /**
     * Get the textColor
     * @return string
     */
    public function getTextColor()
    {
        return $this->textColor;
    }

    /**
     * Set the backgroundColor
     * @param string $backgroundColor
     * @return $this
     */
    public function setBackgroundColor($backgroundColor)
    {
        Assert::isColor($backgroundColor);

        $this->backgroundColor = $backgroundColor;
        return $this;
    }

    /**
     * Set the fontName
     * @param string $fontName
     * @return $this
     */
    public function setFontName($fontName)
    {
        Assert::string($fontName);

        $this->fontName = $fontName;
        return $this;
    }

    /**
     * Set the numberOfCharacters
     * @param integer $numberOfCharacters
     * @return $this
     */
    public function setNumberOfCharacters($numberOfCharacters)
    {
        Assert::integer($numberOfCharacters);

        $this->numberOfCharacters = $numberOfCharacters;
        return $this;
    }

    /**
     * Set the numberOfLines
     * @param integer $numberOfLines
     * @return $this
     */
    public function setNumberOfLines($numberOfLines)
    {
        Assert::integer($numberOfLines);

        $this->numberOfLines = $numberOfLines;
        return $this;
    }

    /**
     * Set the numberOfRaisedLines
     * @param integer $numberOfRaisedLines
     * @return $this
     */
    public function setNumberOfRaisedLines($numberOfRaisedLines)
    {
        Assert::integer($numberOfRaisedLines);

        $this->numberOfRaisedLines = $numberOfRaisedLines;
        return $this;
    }

    /**
     * Set the padding
     * @param integer $padding
     * @return $this
     */
    public function setPadding($padding)
    {
        Assert::integer($padding);

        $this->padding = $padding;
        return $this;
    }

    /**
     * Set the textColor
     * @param string $textColor
     * @return $this
     */
    public function setTextColor($textColor)
    {
        Assert::isColor($textColor);

        $this->textColor = $textColor;
        return $this;
    }

    /**
     * Get the object as array
     * @return array
     */
    public function toArray()
    {
        return [
            'backgroundColor' => is_object($this->backgroundColor)
                ? $this->backgroundColor->toArray()
                : $this->backgroundColor,
            'fontName' => $this->fontName,
            'numberOfCharacters' => $this->numberOfCharacters,
            'numberOfLines' => $this->numberOfLines,
            'numberOfRaisedLines' => $this->numberOfRaisedLines,
            'padding' => $this->padding,
            'textColor' => is_object($this->textColor)
                ? $this->textColor->toArray()
                : $this->textColor
        ];
    }
}
