<?php

namespace Urbania\AppleNews\Format;

use Carbon\Carbon;
use Urbania\AppleNews\Assert;

/**
 * The component for including a photograph.
 *
 * @see https://developer.apple.com/documentation/apple_news/photo
 */
class Photo extends Component
{
    /**
     * The URL of an image file.
     * @var string
     */
    protected $URL;

    /**
     * A caption that describes the photo. Note that this property differs
     * from caption: although the caption can be displayed to users, the
     * accessibilityCaption is used by VoiceOver for iOS only. If
     * accessibilityCaption is omitted, the caption value is used for
     * VoiceOver for iOS.
     * @var string
     */
    protected $accessibilityCaption;

    /**
     * A caption that describes the image. This text can be used by VoiceOver
     * for iOS if accessibilityCaption is not provided. The caption text will
     * appear in a full-screen view of the photo. It will not appear in the
     * main article view. To display a caption in the main article view, use
     * a Caption component.
     * @var \Urbania\AppleNews\Format\CaptionDescriptor|string
     */
    protected $caption;

    /**
     * Indicates that the image may contain explicit content.
     * @var boolean
     */
    protected $explicitContent;

    /**
     * This component always has a role of photo.
     * @var string
     */
    protected $role = 'photo';

    public function __construct(array $data = [])
    {
        parent::__construct($data);

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
     * Get the role
     * @return string
     */
    public function getRole()
    {
        return $this->role;
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
     * Convert the object into something JSON serializable.
     * @return array
     */
    public function jsonSerialize(int $options)
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
        if (isset($this->URL)) {
            $data['URL'] = $this->URL;
        }
        if (isset($this->accessibilityCaption)) {
            $data['accessibilityCaption'] = $this->accessibilityCaption;
        }
        if (isset($this->caption)) {
            $data['caption'] = is_object($this->caption)
                ? $this->caption->toArray()
                : $this->caption;
        }
        if (isset($this->explicitContent)) {
            $data['explicitContent'] = $this->explicitContent;
        }
        if (isset($this->role)) {
            $data['role'] = $this->role;
        }
        return $data;
    }
}
