<?php

namespace Urbania\AppleNews\Format;

use Carbon\Carbon;
use Urbania\AppleNews\Assert;

/**
 * An object used in a gallery or mosaic component for displaying an
 * individual image.
 *
 * @see https://developer.apple.com/documentation/apple_news/galleryitem
 */
class GalleryItem
{
    /**
     * The URL of an image to display in a gallery or mosaic.
     * @var string
     */
    protected $URL;

    /**
     * A caption that describes the image. Note that this property differs
     * from caption: although the caption can be displayed to users,
     * accessibilityCaption is used by VoiceOver for iOS only. If
     * accessibilityCaption is omitted, the caption value is used.
     * @var string
     */
    protected $accessibilityCaption;

    /**
     * A caption that describes the image. This text can be used by VoiceOver
     * for iOS if if accessibilityCaption is not provided. The gallery
     * component does not display the caption to the user except when the
     * gallery is clicked to display it full screen.
     * @var \Urbania\AppleNews\Format\CaptionDescriptor|string
     */
    protected $caption;

    /**
     * Indicates that the image may contain explicit content.
     * @var boolean
     */
    protected $explicitContent;

    public function __construct(array $data = [])
    {
        if (isset($data['URL'])) {
            $this->setURL($data['URL']);
        }

        if (isset($data['accessibilityCaption'])) {
            $this->setAccessibilityCaption($data['accessibilityCaption']);
        }

        if (isset($data['caption'])) {
            $this->setCaption($data['caption']);
        }

        if (isset($data['explicitContent'])) {
            $this->setExplicitContent($data['explicitContent']);
        }
    }

    /**
     * Get the accessibilityCaption
     * @return string
     */
    public function getAccessibilityCaption()
    {
        return $this->accessibilityCaption;
    }

    /**
     * Get the caption
     * @return \Urbania\AppleNews\Format\CaptionDescriptor|string
     */
    public function getCaption()
    {
        return $this->caption;
    }

    /**
     * Get the explicitContent
     * @return boolean
     */
    public function getExplicitContent()
    {
        return $this->explicitContent;
    }

    /**
     * Get the URL
     * @return string
     */
    public function getURL()
    {
        return $this->URL;
    }

    /**
     * Set the accessibilityCaption
     * @param string $accessibilityCaption
     * @return $this
     */
    public function setAccessibilityCaption($accessibilityCaption)
    {
        Assert::string($accessibilityCaption);

        $this->accessibilityCaption = $accessibilityCaption;
        return $this;
    }

    /**
     * Set the caption
     * @param \Urbania\AppleNews\Format\CaptionDescriptor|array|string $caption
     * @return $this
     */
    public function setCaption($caption)
    {
        if (is_object($caption)) {
            Assert::isInstanceOf($caption, CaptionDescriptor::class);
        } elseif (!is_array($caption)) {
            Assert::string($caption);
        }

        $this->caption = is_array($caption)
            ? new CaptionDescriptor($caption)
            : $caption;
        return $this;
    }

    /**
     * Set the explicitContent
     * @param boolean $explicitContent
     * @return $this
     */
    public function setExplicitContent($explicitContent)
    {
        Assert::boolean($explicitContent);

        $this->explicitContent = $explicitContent;
        return $this;
    }

    /**
     * Set the URL
     * @param string $URL
     * @return $this
     */
    public function setURL($URL)
    {
        Assert::string($URL);

        $this->URL = $URL;
        return $this;
    }

    /**
     * Get the object as array
     * @return array
     */
    public function toArray()
    {
        return [
            'URL' => $this->URL,
            'accessibilityCaption' => $this->accessibilityCaption,
            'caption' => is_object($this->caption)
                ? $this->caption->toArray()
                : $this->caption,
            'explicitContent' => $this->explicitContent
        ];
    }
}
