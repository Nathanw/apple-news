<?php

namespace Urbania\AppleNews\Api\Response;

use Carbon\Carbon;
use Urbania\AppleNews\Assert;

/**
 * See the fields returned by the read channel endpoint.
 *
 * @see https://developer.apple.com/documentation/apple_news/channel
 */
class Channel
{
    /**
     * The date and time the channel was created.
     * @var \Carbon\Carbon
     */
    protected $createdAt;

    /**
     * The unique identifier of the channel.
     * @var string
     */
    protected $id;

    /**
     * The date and time the channel was last modified.
     * @var \Carbon\Carbon
     */
    protected $modifiedAt;

    /**
     * The name of the channel.
     * @var string
     */
    protected $name;

    /**
     * The URL to the channel within the News app. The shareUrl field applies
     * only on devices with iOS 9 installed.
     * @var string
     */
    protected $shareUrl;

    /**
     * The channel.
     * @var string
     */
    protected $type;

    /**
     * The website that corresponds to this channel.
     * @var string
     */
    protected $website;

    public function __construct(array $data = [])
    {
        if (isset($data['createdAt'])) {
            $this->setCreatedAt($data['createdAt']);
        }

        if (isset($data['id'])) {
            $this->setId($data['id']);
        }

        if (isset($data['modifiedAt'])) {
            $this->setModifiedAt($data['modifiedAt']);
        }

        if (isset($data['name'])) {
            $this->setName($data['name']);
        }

        if (isset($data['shareUrl'])) {
            $this->setShareUrl($data['shareUrl']);
        }

        if (isset($data['type'])) {
            $this->setType($data['type']);
        }

        if (isset($data['website'])) {
            $this->setWebsite($data['website']);
        }
    }

    /**
     * Get the createdAt
     * @return \Carbon\Carbon
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Get the id
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the modifiedAt
     * @return \Carbon\Carbon
     */
    public function getModifiedAt()
    {
        return $this->modifiedAt;
    }

    /**
     * Get the name
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the shareUrl
     * @return string
     */
    public function getShareUrl()
    {
        return $this->shareUrl;
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
     * Get the website
     * @return string
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Set the createdAt
     * @param \Carbon\Carbon|string $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt)
    {
        Assert::isDate($createdAt);

        $this->createdAt = is_string($createdAt)
            ? Carbon::parse($createdAt)
            : $createdAt;
        return $this;
    }

    /**
     * Set the id
     * @param string $id
     * @return $this
     */
    public function setId($id)
    {
        Assert::uuid($id);

        $this->id = $id;
        return $this;
    }

    /**
     * Set the modifiedAt
     * @param \Carbon\Carbon|string $modifiedAt
     * @return $this
     */
    public function setModifiedAt($modifiedAt)
    {
        Assert::isDate($modifiedAt);

        $this->modifiedAt = is_string($modifiedAt)
            ? Carbon::parse($modifiedAt)
            : $modifiedAt;
        return $this;
    }

    /**
     * Set the name
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        Assert::string($name);

        $this->name = $name;
        return $this;
    }

    /**
     * Set the shareUrl
     * @param string $shareUrl
     * @return $this
     */
    public function setShareUrl($shareUrl)
    {
        Assert::string($shareUrl);

        $this->shareUrl = $shareUrl;
        return $this;
    }

    /**
     * Set the type
     * @param string $type
     * @return $this
     */
    public function setType($type)
    {
        Assert::string($type);

        $this->type = $type;
        return $this;
    }

    /**
     * Set the website
     * @param string $website
     * @return $this
     */
    public function setWebsite($website)
    {
        Assert::string($website);

        $this->website = $website;
        return $this;
    }

    /**
     * Get the object as array
     * @return array
     */
    public function toArray()
    {
        return [
            'createdAt' => !is_null($this->createdAt)
                ? $this->createdAt->toIso8601String()
                : null,
            'id' => $this->id,
            'modifiedAt' => !is_null($this->modifiedAt)
                ? $this->modifiedAt->toIso8601String()
                : null,
            'name' => $this->name,
            'shareUrl' => $this->shareUrl,
            'type' => $this->type,
            'website' => $this->website
        ];
    }
}
