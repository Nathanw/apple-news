<?php

namespace Urbania\AppleNews\Format;

use Carbon\Carbon;
use Urbania\AppleNews\Assert;

/**
 * The component for adding a map with a specific point of interest.
 *
 * @see https://developer.apple.com/documentation/apple_news/place
 */
class Place extends Component
{
    /**
     * Optional caption text describing what is visible on the map. Note that
     * this property differs from caption: although the caption may be
     * displayed to users, the accessibilityCaption is used for voice-over
     * only. The value in this property should describe the contents of the
     * image for non-sighted users. If this property is omitted, the value
     * from caption is used for VoiceOver for iOS.
     * @var string
     */
    protected $accessibilityCaption;

    /**
     * A string that describes the place depicted on the map. For example, if
     * the latitude and longitude point to a park, the caption should contain
     * the name of the park. The caption will be displayed in the full screen
     * version of the map, and could be used for VoiceOver for iOS.
     * @var string
     */
    protected $caption;

    /**
     * The latitude of the place’s location.
     * @var integer|float
     */
    protected $latitude;

    /**
     * The longitude of the place’s location.
     * @var integer|float
     */
    protected $longitude;

    /**
     * Use this to define the type of map to display by default. Valid values
     * are:
     * @var string
     */
    protected $mapType;

    /**
     * This component always has a role of place.
     * @var string
     */
    protected $role = 'place';

    /**
     * Optional configuration for defining the visible area of a map,
     * relative to its center. A span is defined in deltas for latitude and
     * longitude.
     * @var \Urbania\AppleNews\Format\MapSpan
     */
    protected $span;

    public function __construct(array $data = [])
    {
        parent::__construct($data);

        if (isset($data['accessibilityCaption'])) {
            $this->setAccessibilityCaption($data['accessibilityCaption']);
        }

        if (isset($data['caption'])) {
            $this->setCaption($data['caption']);
        }

        if (isset($data['latitude'])) {
            $this->setLatitude($data['latitude']);
        }

        if (isset($data['longitude'])) {
            $this->setLongitude($data['longitude']);
        }

        if (isset($data['mapType'])) {
            $this->setMapType($data['mapType']);
        }

        if (isset($data['span'])) {
            $this->setSpan($data['span']);
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
     * @return string
     */
    public function getCaption()
    {
        return $this->caption;
    }

    /**
     * Get the latitude
     * @return integer|float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Get the longitude
     * @return integer|float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Get the mapType
     * @return string
     */
    public function getMapType()
    {
        return $this->mapType;
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
     * Get the span
     * @return \Urbania\AppleNews\Format\MapSpan
     */
    public function getSpan()
    {
        return $this->span;
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
     * @param string $caption
     * @return $this
     */
    public function setCaption($caption)
    {
        Assert::string($caption);

        $this->caption = $caption;
        return $this;
    }

    /**
     * Set the latitude
     * @param integer|float $latitude
     * @return $this
     */
    public function setLatitude($latitude)
    {
        Assert::number($latitude);

        $this->latitude = $latitude;
        return $this;
    }

    /**
     * Set the longitude
     * @param integer|float $longitude
     * @return $this
     */
    public function setLongitude($longitude)
    {
        Assert::number($longitude);

        $this->longitude = $longitude;
        return $this;
    }

    /**
     * Set the mapType
     * @param string $mapType
     * @return $this
     */
    public function setMapType($mapType)
    {
        Assert::oneOf($mapType, ["standard", "hybrid", "satellite"]);

        $this->mapType = $mapType;
        return $this;
    }

    /**
     * Set the span
     * @param \Urbania\AppleNews\Format\MapSpan|array $span
     * @return $this
     */
    public function setSpan($span)
    {
        if (is_object($span)) {
            Assert::isInstanceOf($span, MapSpan::class);
        } else {
            Assert::isArray($span);
        }

        $this->span = is_array($span) ? new MapSpan($span) : $span;
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
        if (isset($this->accessibilityCaption)) {
            $data['accessibilityCaption'] = $this->accessibilityCaption;
        }
        if (isset($this->caption)) {
            $data['caption'] = $this->caption;
        }
        if (isset($this->latitude)) {
            $data['latitude'] = $this->latitude;
        }
        if (isset($this->longitude)) {
            $data['longitude'] = $this->longitude;
        }
        if (isset($this->mapType)) {
            $data['mapType'] = $this->mapType;
        }
        if (isset($this->role)) {
            $data['role'] = $this->role;
        }
        if (isset($this->span)) {
            $data['span'] = is_object($this->span)
                ? $this->span->toArray()
                : $this->span;
        }
        return $data;
    }
}
