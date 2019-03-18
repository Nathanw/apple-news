<?php

namespace Urbania\AppleNews\Format;

use Carbon\Carbon;
use Urbania\AppleNews\Assert;

/**
 * The object for defining the style for a text component, including
 * spacing, alignment, and drop caps.
 *
 * @see https://developer.apple.com/documentation/apple_news/componenttextstyle
 */
class ComponentTextStyle extends TextStyle
{
    /**
     * The background color for text lines.
     * @var string
     */
    protected $backgroundColor;

    /**
     * Defines the style of drop cap to apply to the first paragraph of the
     * component.
     * @var \Urbania\AppleNews\Format\DropCapStyle
     */
    protected $dropCapStyle;

    /**
     * Defines the indent of the first line of each paragraph in points.
     * @var integer
     */
    protected $firstLineIndent;

    /**
     * The font family to use for text rendering, for example Gill Sans.
     * Using a combination of fontFamily, fontWidth, fontWeight, and
     * fontStyle you can define the appearance of the text. News
     * automatically selects the appropriate font variant from the available
     * variants in that family.
     * @var string
     */
    protected $fontFamily;

    /**
     * Use fontName to refer to an explicit font variant’s Postscript name,
     * such as GillSans-Bold. Alternatively, you can use a combination of
     * fontFamily, fontWeight, fontWidth and/or fontStyle to have News
     * automatically select the appropriate variant depending on the text
     * formatting used.
     * @var string
     */
    protected $fontName;

    /**
     * The size of the font, in points. By default, the font size will be
     * inherited from a parent component or a default style. As a best
     * practice, try not to go below 16 points for body text. The fontSize
     * may be automatically resized for different device sizes or for iOS
     * devices with Larger Accessibility Sizes enabled.
     * @var integer
     */
    protected $fontSize;

    /**
     * The font style to apply. Available options are:
     * @var string
     */
    protected $fontStyle;

    /**
     * The font weight to apply for font selection. In addition to explicit
     * weights (named or numerical), lighter and bolder are available, to set
     * text in a lighter or bolder font as compared to its surrounding text.
     * @var integer|string
     */
    protected $fontWeight;

    /**
     * The font width to apply for font selection (known in CSS as
     * font-stretch) defines the width characteristics of a font variant
     * between normal, condensed and expanded. Some font families have
     * separate families assigned for different widths (for example, "Avenir
     * Next" and "Avenir Next Condensed"), so make sure that the fontFamily
     * you select supports the specified fontWidth. Available options are:
     * @var string
     */
    protected $fontWidth;

    /**
     * Defines whether punctuation should be positioned outside the margins
     * of the text.
     * @var boolean
     */
    protected $hangingPunctuation;

    /**
     * Indicates whether text should be hyphenated when necessary. By
     * default, only components with a role of body or intro have hyphenation
     * enabled. All other components default to false.
     * @var boolean
     */
    protected $hyphenation;

    /**
     * The default line height, in points. The lineHeight will be
     * recalculated as necessary, relative to the fontSize. For example, when
     * the font is automatically resized to fit a smaller screen, the line
     * height will also be adjusted accordingly.
     * @var integer
     */
    protected $lineHeight;

    /**
     * Text styling for all links within a text component.
     * @var \Urbania\AppleNews\Format\TextStyle
     */
    protected $linkStyle;

    /**
     * For use with text components with HTML markup. You can create text
     * styles containing an orderedListItems definition to configure how list
     * items inside <ol> tags should be displayed.
     * @var \Urbania\AppleNews\Format\ListItemStyle
     */
    protected $orderedListItems;

    /**
     * Defines the spacing after each paragraph in points relative to the
     * lineHeight.
     * @var integer
     */
    protected $paragraphSpacingAfter;

    /**
     * Defines the spacing before each paragraph in points relative to the
     * lineHeight.
     * @var integer
     */
    protected $paragraphSpacingBefore;

    /**
     * The text strikethrough. Set strikethrough to true to use the text
     * color inherited from the textColor property as the strikethrough
     * color, or provide a text decoration definition with a different color.
     * @var \Urbania\AppleNews\Format\TextDecoration|boolean
     */
    protected $strikethrough;

    /**
     * The stroke style for the text outline. By default, stroke will be
     * omitted.
     * @var \Urbania\AppleNews\Format\TextStrokeStyle
     */
    protected $stroke;

    /**
     * The justification for all text within the component.
     * @var string
     */
    protected $textAlignment;

    /**
     * The text color.
     * @var string
     */
    protected $textColor;

    /**
     * The text shadow for this style.
     * @var \Urbania\AppleNews\Format\Shadow
     */
    protected $textShadow;

    /**
     * The amount of tracking (spacing between characters) in text, as a
     * percentage of the fontSize. The actual spacing between letters is
     * determined by combining information from the font and font size.
     * @var integer|float
     */
    protected $tracking;

    /**
     * The text underlining. This style can be used for links. Set underline
     * to true to use the text color as the underline color, or provide a
     * text decoration with a different color.
     * @var \Urbania\AppleNews\Format\TextDecoration|boolean
     */
    protected $underline;

    /**
     * For use with text components with HTML marku. You can create text
     * styles containing an unorderedListItems definition to configure how
     * list items inside <ul> tags should be displayed.
     * @var \Urbania\AppleNews\Format\ListItemStyle
     */
    protected $unorderedListItems;

    /**
     * The vertical alignment of the text. You can use this property for
     * superscripts and subscripts.
     * @var string
     */
    protected $verticalAlignment;

    public function __construct(array $data = [])
    {
        parent::__construct($data);

        if (isset($data['backgroundColor'])) {
            $this->setBackgroundColor($data['backgroundColor']);
        }

        if (isset($data['dropCapStyle'])) {
            $this->setDropCapStyle($data['dropCapStyle']);
        }

        if (isset($data['firstLineIndent'])) {
            $this->setFirstLineIndent($data['firstLineIndent']);
        }

        if (isset($data['fontFamily'])) {
            $this->setFontFamily($data['fontFamily']);
        }

        if (isset($data['fontName'])) {
            $this->setFontName($data['fontName']);
        }

        if (isset($data['fontSize'])) {
            $this->setFontSize($data['fontSize']);
        }

        if (isset($data['fontStyle'])) {
            $this->setFontStyle($data['fontStyle']);
        }

        if (isset($data['fontWeight'])) {
            $this->setFontWeight($data['fontWeight']);
        }

        if (isset($data['fontWidth'])) {
            $this->setFontWidth($data['fontWidth']);
        }

        if (isset($data['hangingPunctuation'])) {
            $this->setHangingPunctuation($data['hangingPunctuation']);
        }

        if (isset($data['hyphenation'])) {
            $this->setHyphenation($data['hyphenation']);
        }

        if (isset($data['lineHeight'])) {
            $this->setLineHeight($data['lineHeight']);
        }

        if (isset($data['linkStyle'])) {
            $this->setLinkStyle($data['linkStyle']);
        }

        if (isset($data['orderedListItems'])) {
            $this->setOrderedListItems($data['orderedListItems']);
        }

        if (isset($data['paragraphSpacingAfter'])) {
            $this->setParagraphSpacingAfter($data['paragraphSpacingAfter']);
        }

        if (isset($data['paragraphSpacingBefore'])) {
            $this->setParagraphSpacingBefore($data['paragraphSpacingBefore']);
        }

        if (isset($data['strikethrough'])) {
            $this->setStrikethrough($data['strikethrough']);
        }

        if (isset($data['stroke'])) {
            $this->setStroke($data['stroke']);
        }

        if (isset($data['textAlignment'])) {
            $this->setTextAlignment($data['textAlignment']);
        }

        if (isset($data['textColor'])) {
            $this->setTextColor($data['textColor']);
        }

        if (isset($data['textShadow'])) {
            $this->setTextShadow($data['textShadow']);
        }

        if (isset($data['tracking'])) {
            $this->setTracking($data['tracking']);
        }

        if (isset($data['underline'])) {
            $this->setUnderline($data['underline']);
        }

        if (isset($data['unorderedListItems'])) {
            $this->setUnorderedListItems($data['unorderedListItems']);
        }

        if (isset($data['verticalAlignment'])) {
            $this->setVerticalAlignment($data['verticalAlignment']);
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
     * Get the dropCapStyle
     * @return \Urbania\AppleNews\Format\DropCapStyle
     */
    public function getDropCapStyle()
    {
        return $this->dropCapStyle;
    }

    /**
     * Get the firstLineIndent
     * @return integer
     */
    public function getFirstLineIndent()
    {
        return $this->firstLineIndent;
    }

    /**
     * Get the fontFamily
     * @return string
     */
    public function getFontFamily()
    {
        return $this->fontFamily;
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
     * Get the fontSize
     * @return integer
     */
    public function getFontSize()
    {
        return $this->fontSize;
    }

    /**
     * Get the fontStyle
     * @return string
     */
    public function getFontStyle()
    {
        return $this->fontStyle;
    }

    /**
     * Get the fontWeight
     * @return integer|string
     */
    public function getFontWeight()
    {
        return $this->fontWeight;
    }

    /**
     * Get the fontWidth
     * @return string
     */
    public function getFontWidth()
    {
        return $this->fontWidth;
    }

    /**
     * Get the hangingPunctuation
     * @return boolean
     */
    public function getHangingPunctuation()
    {
        return $this->hangingPunctuation;
    }

    /**
     * Get the hyphenation
     * @return boolean
     */
    public function getHyphenation()
    {
        return $this->hyphenation;
    }

    /**
     * Get the lineHeight
     * @return integer
     */
    public function getLineHeight()
    {
        return $this->lineHeight;
    }

    /**
     * Get the linkStyle
     * @return \Urbania\AppleNews\Format\TextStyle
     */
    public function getLinkStyle()
    {
        return $this->linkStyle;
    }

    /**
     * Get the orderedListItems
     * @return \Urbania\AppleNews\Format\ListItemStyle
     */
    public function getOrderedListItems()
    {
        return $this->orderedListItems;
    }

    /**
     * Get the paragraphSpacingAfter
     * @return integer
     */
    public function getParagraphSpacingAfter()
    {
        return $this->paragraphSpacingAfter;
    }

    /**
     * Get the paragraphSpacingBefore
     * @return integer
     */
    public function getParagraphSpacingBefore()
    {
        return $this->paragraphSpacingBefore;
    }

    /**
     * Get the strikethrough
     * @return \Urbania\AppleNews\Format\TextDecoration|boolean
     */
    public function getStrikethrough()
    {
        return $this->strikethrough;
    }

    /**
     * Get the stroke
     * @return \Urbania\AppleNews\Format\TextStrokeStyle
     */
    public function getStroke()
    {
        return $this->stroke;
    }

    /**
     * Get the textAlignment
     * @return string
     */
    public function getTextAlignment()
    {
        return $this->textAlignment;
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
     * Get the textShadow
     * @return \Urbania\AppleNews\Format\Shadow
     */
    public function getTextShadow()
    {
        return $this->textShadow;
    }

    /**
     * Get the tracking
     * @return integer|float
     */
    public function getTracking()
    {
        return $this->tracking;
    }

    /**
     * Get the underline
     * @return \Urbania\AppleNews\Format\TextDecoration|boolean
     */
    public function getUnderline()
    {
        return $this->underline;
    }

    /**
     * Get the unorderedListItems
     * @return \Urbania\AppleNews\Format\ListItemStyle
     */
    public function getUnorderedListItems()
    {
        return $this->unorderedListItems;
    }

    /**
     * Get the verticalAlignment
     * @return string
     */
    public function getVerticalAlignment()
    {
        return $this->verticalAlignment;
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
     * Set the dropCapStyle
     * @param \Urbania\AppleNews\Format\DropCapStyle|array $dropCapStyle
     * @return $this
     */
    public function setDropCapStyle($dropCapStyle)
    {
        if (is_object($dropCapStyle)) {
            Assert::isInstanceOf($dropCapStyle, DropCapStyle::class);
        } else {
            Assert::isArray($dropCapStyle);
        }

        $this->dropCapStyle = is_array($dropCapStyle)
            ? new DropCapStyle($dropCapStyle)
            : $dropCapStyle;
        return $this;
    }

    /**
     * Set the firstLineIndent
     * @param integer $firstLineIndent
     * @return $this
     */
    public function setFirstLineIndent($firstLineIndent)
    {
        Assert::integer($firstLineIndent);

        $this->firstLineIndent = $firstLineIndent;
        return $this;
    }

    /**
     * Set the fontFamily
     * @param string $fontFamily
     * @return $this
     */
    public function setFontFamily($fontFamily)
    {
        Assert::string($fontFamily);

        $this->fontFamily = $fontFamily;
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
     * Set the fontSize
     * @param integer $fontSize
     * @return $this
     */
    public function setFontSize($fontSize)
    {
        Assert::integer($fontSize);

        $this->fontSize = $fontSize;
        return $this;
    }

    /**
     * Set the fontStyle
     * @param string $fontStyle
     * @return $this
     */
    public function setFontStyle($fontStyle)
    {
        Assert::oneOf($fontStyle, ["normal", "italic", "oblique"]);

        $this->fontStyle = $fontStyle;
        return $this;
    }

    /**
     * Set the fontWeight
     * @param integer|string $fontWeight
     * @return $this
     */
    public function setFontWeight($fontWeight)
    {
        Assert::oneOf($fontWeight, [
            100,
            200,
            300,
            400,
            500,
            600,
            700,
            800,
            900,
            "thin",
            "extra-light",
            "extralight",
            "ultra-light",
            "light",
            "regular",
            "normal",
            "book",
            "roman",
            "medium",
            "semi-bold",
            "semibold",
            "demi-bold",
            "demibold",
            "bold",
            "extra-bold",
            "extrabold",
            "ultra-bold",
            "ultrabold",
            "black",
            "heavy",
            "lighter",
            "bolder"
        ]);

        $this->fontWeight = $fontWeight;
        return $this;
    }

    /**
     * Set the fontWidth
     * @param string $fontWidth
     * @return $this
     */
    public function setFontWidth($fontWidth)
    {
        Assert::oneOf($fontWidth, [
            "ultra-condensed",
            "extra-condensed",
            "condensed",
            "semi-condensed",
            "normal",
            "semi-expanded",
            "expanded",
            "extra-expanded",
            "ultra-expanded"
        ]);

        $this->fontWidth = $fontWidth;
        return $this;
    }

    /**
     * Set the hangingPunctuation
     * @param boolean $hangingPunctuation
     * @return $this
     */
    public function setHangingPunctuation($hangingPunctuation)
    {
        Assert::boolean($hangingPunctuation);

        $this->hangingPunctuation = $hangingPunctuation;
        return $this;
    }

    /**
     * Set the hyphenation
     * @param boolean $hyphenation
     * @return $this
     */
    public function setHyphenation($hyphenation)
    {
        Assert::boolean($hyphenation);

        $this->hyphenation = $hyphenation;
        return $this;
    }

    /**
     * Set the lineHeight
     * @param integer $lineHeight
     * @return $this
     */
    public function setLineHeight($lineHeight)
    {
        Assert::integer($lineHeight);

        $this->lineHeight = $lineHeight;
        return $this;
    }

    /**
     * Set the linkStyle
     * @param \Urbania\AppleNews\Format\TextStyle|array $linkStyle
     * @return $this
     */
    public function setLinkStyle($linkStyle)
    {
        if (is_object($linkStyle)) {
            Assert::isInstanceOf($linkStyle, TextStyle::class);
        } else {
            Assert::isArray($linkStyle);
        }

        $this->linkStyle = is_array($linkStyle)
            ? new TextStyle($linkStyle)
            : $linkStyle;
        return $this;
    }

    /**
     * Set the orderedListItems
     * @param \Urbania\AppleNews\Format\ListItemStyle|array $orderedListItems
     * @return $this
     */
    public function setOrderedListItems($orderedListItems)
    {
        if (is_object($orderedListItems)) {
            Assert::isInstanceOf($orderedListItems, ListItemStyle::class);
        } else {
            Assert::isArray($orderedListItems);
        }

        $this->orderedListItems = is_array($orderedListItems)
            ? new ListItemStyle($orderedListItems)
            : $orderedListItems;
        return $this;
    }

    /**
     * Set the paragraphSpacingAfter
     * @param integer $paragraphSpacingAfter
     * @return $this
     */
    public function setParagraphSpacingAfter($paragraphSpacingAfter)
    {
        Assert::integer($paragraphSpacingAfter);

        $this->paragraphSpacingAfter = $paragraphSpacingAfter;
        return $this;
    }

    /**
     * Set the paragraphSpacingBefore
     * @param integer $paragraphSpacingBefore
     * @return $this
     */
    public function setParagraphSpacingBefore($paragraphSpacingBefore)
    {
        Assert::integer($paragraphSpacingBefore);

        $this->paragraphSpacingBefore = $paragraphSpacingBefore;
        return $this;
    }

    /**
     * Set the strikethrough
     * @param \Urbania\AppleNews\Format\TextDecoration|array|boolean $strikethrough
     * @return $this
     */
    public function setStrikethrough($strikethrough)
    {
        if (is_object($strikethrough)) {
            Assert::isInstanceOf($strikethrough, TextDecoration::class);
        } elseif (!is_array($strikethrough)) {
            Assert::boolean($strikethrough);
        }

        $this->strikethrough = is_array($strikethrough)
            ? new TextDecoration($strikethrough)
            : $strikethrough;
        return $this;
    }

    /**
     * Set the stroke
     * @param \Urbania\AppleNews\Format\TextStrokeStyle|array $stroke
     * @return $this
     */
    public function setStroke($stroke)
    {
        if (is_object($stroke)) {
            Assert::isInstanceOf($stroke, TextStrokeStyle::class);
        } else {
            Assert::isArray($stroke);
        }

        $this->stroke = is_array($stroke)
            ? new TextStrokeStyle($stroke)
            : $stroke;
        return $this;
    }

    /**
     * Set the textAlignment
     * @param string $textAlignment
     * @return $this
     */
    public function setTextAlignment($textAlignment)
    {
        Assert::oneOf($textAlignment, [
            "left",
            "center",
            "right",
            "justified",
            "none"
        ]);

        $this->textAlignment = $textAlignment;
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
     * Set the textShadow
     * @param \Urbania\AppleNews\Format\Shadow|array $textShadow
     * @return $this
     */
    public function setTextShadow($textShadow)
    {
        if (is_object($textShadow)) {
            Assert::isInstanceOf($textShadow, Shadow::class);
        } else {
            Assert::isArray($textShadow);
        }

        $this->textShadow = is_array($textShadow)
            ? new Shadow($textShadow)
            : $textShadow;
        return $this;
    }

    /**
     * Set the tracking
     * @param integer|float $tracking
     * @return $this
     */
    public function setTracking($tracking)
    {
        Assert::number($tracking);

        $this->tracking = $tracking;
        return $this;
    }

    /**
     * Set the underline
     * @param \Urbania\AppleNews\Format\TextDecoration|array|boolean $underline
     * @return $this
     */
    public function setUnderline($underline)
    {
        if (is_object($underline)) {
            Assert::isInstanceOf($underline, TextDecoration::class);
        } elseif (!is_array($underline)) {
            Assert::boolean($underline);
        }

        $this->underline = is_array($underline)
            ? new TextDecoration($underline)
            : $underline;
        return $this;
    }

    /**
     * Set the unorderedListItems
     * @param \Urbania\AppleNews\Format\ListItemStyle|array $unorderedListItems
     * @return $this
     */
    public function setUnorderedListItems($unorderedListItems)
    {
        if (is_object($unorderedListItems)) {
            Assert::isInstanceOf($unorderedListItems, ListItemStyle::class);
        } else {
            Assert::isArray($unorderedListItems);
        }

        $this->unorderedListItems = is_array($unorderedListItems)
            ? new ListItemStyle($unorderedListItems)
            : $unorderedListItems;
        return $this;
    }

    /**
     * Set the verticalAlignment
     * @param string $verticalAlignment
     * @return $this
     */
    public function setVerticalAlignment($verticalAlignment)
    {
        Assert::string($verticalAlignment);

        $this->verticalAlignment = $verticalAlignment;
        return $this;
    }

    /**
     * Get the object as array
     * @return array
     */
    public function toArray()
    {
        return array_merge(parent::toArray(), [
            'backgroundColor' => is_object($this->backgroundColor)
                ? $this->backgroundColor->toArray()
                : $this->backgroundColor,
            'dropCapStyle' => is_object($this->dropCapStyle)
                ? $this->dropCapStyle->toArray()
                : $this->dropCapStyle,
            'firstLineIndent' => $this->firstLineIndent,
            'fontFamily' => $this->fontFamily,
            'fontName' => $this->fontName,
            'fontSize' => $this->fontSize,
            'fontStyle' => $this->fontStyle,
            'fontWeight' => $this->fontWeight,
            'fontWidth' => $this->fontWidth,
            'hangingPunctuation' => $this->hangingPunctuation,
            'hyphenation' => $this->hyphenation,
            'lineHeight' => $this->lineHeight,
            'linkStyle' => is_object($this->linkStyle)
                ? $this->linkStyle->toArray()
                : $this->linkStyle,
            'orderedListItems' => is_object($this->orderedListItems)
                ? $this->orderedListItems->toArray()
                : $this->orderedListItems,
            'paragraphSpacingAfter' => $this->paragraphSpacingAfter,
            'paragraphSpacingBefore' => $this->paragraphSpacingBefore,
            'strikethrough' => is_object($this->strikethrough)
                ? $this->strikethrough->toArray()
                : $this->strikethrough,
            'stroke' => is_object($this->stroke)
                ? $this->stroke->toArray()
                : $this->stroke,
            'textAlignment' => $this->textAlignment,
            'textColor' => is_object($this->textColor)
                ? $this->textColor->toArray()
                : $this->textColor,
            'textShadow' => is_object($this->textShadow)
                ? $this->textShadow->toArray()
                : $this->textShadow,
            'tracking' => $this->tracking,
            'underline' => is_object($this->underline)
                ? $this->underline->toArray()
                : $this->underline,
            'unorderedListItems' => is_object($this->unorderedListItems)
                ? $this->unorderedListItems->toArray()
                : $this->unorderedListItems,
            'verticalAlignment' => $this->verticalAlignment
        ]);
    }
}
