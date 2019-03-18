<?php

namespace Urbania\AppleNews\Format;

use Carbon\Carbon;
use Urbania\AppleNews\Assert;

/**
 * The component addition object for making a component interactable and
 * making it open a link to elsewhere in News.
 *
 * @see https://developer.apple.com/documentation/apple_news/componentlink
 */
class ComponentLink extends ComponentAddition implements \JsonSerializable
{
    /**
     * The URL that should be opened when a user interacts with the
     * component. Use a valid Apple News URL beginning with
     * https://apple.news/, or a URL that is associated with an Apple News
     * article by its canonicalURL in Metadata, or a URL to the iTunes Store,
     * the App Store, the iBooks Store, Apple Podcasts, or Apple Music.
     * @var string
     */
    protected $URL;

    /**
     * The type of addition should be link for a ComponentLink object.
     * @var string
     */
    protected $type = 'link';

    public function __construct(array $data = [])
    {
        parent::__construct($data);

        if (isset($data['URL'])) {
            $this->setURL($data['URL']);
        }
    }

    /**
     * Get the type
     * @return string
     */
    public function getType()
    {
        return $this->type;
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
        $data = parent::toArray();
        if (isset($this->URL)) {
            $data['URL'] = $this->URL;
        }
        if (isset($this->type)) {
            $data['type'] = $this->type;
        }
        return $data;
    }
}
