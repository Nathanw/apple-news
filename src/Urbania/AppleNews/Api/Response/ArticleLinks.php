<?php

namespace Urbania\AppleNews\Api\Response;

use Carbon\Carbon;
use Urbania\AppleNews\Assert;

/**
 * See the links returned by the article endpoints.
 *
 * @see https://developer.apple.com/documentation/apple_news/articlelinks
 */
class ArticleLinks
{
    /**
     * The URL of the channel in which this article appears.
     * @var string
     */
    protected $channel;

    /**
     * The sections, if any, in which this article appears.
     * @var string[]
     */
    protected $sections;

    /**
     * The URL at which this resource can be read, updated, and deleted.
     * @var string
     */
    protected $self;

    public function __construct(array $data = [])
    {
        if (isset($data['channel'])) {
            $this->setChannel($data['channel']);
        }

        if (isset($data['sections'])) {
            $this->setSections($data['sections']);
        }

        if (isset($data['self'])) {
            $this->setSelf($data['self']);
        }
    }

    /**
     * Get the channel
     * @return string
     */
    public function getChannel()
    {
        return $this->channel;
    }

    /**
     * Get the sections
     * @return string[]
     */
    public function getSections()
    {
        return $this->sections;
    }

    /**
     * Get the self
     * @return string
     */
    public function getSelf()
    {
        return $this->self;
    }

    /**
     * Set the channel
     * @param string $channel
     * @return $this
     */
    public function setChannel($channel)
    {
        Assert::string($channel);

        $this->channel = $channel;
        return $this;
    }

    /**
     * Set the sections
     * @param string[] $sections
     * @return $this
     */
    public function setSections($sections)
    {
        Assert::isArray($sections);
        Assert::allString($sections);

        $this->sections = $sections;
        return $this;
    }

    /**
     * Set the self
     * @param string $self
     * @return $this
     */
    public function setSelf($self)
    {
        Assert::string($self);

        $this->self = $self;
        return $this;
    }

    /**
     * Get the object as array
     * @return array
     */
    public function toArray()
    {
        return [
            'channel' => $this->channel,
            'sections' => $this->sections ?? [],
            'self' => $this->self
        ];
    }
}
