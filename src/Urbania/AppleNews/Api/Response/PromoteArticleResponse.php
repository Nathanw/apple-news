<?php

namespace Urbania\AppleNews\Api\Response;

use Carbon\Carbon;
use Urbania\AppleNews\Assert;

/**
 * See the field returned by the promote article response.
 *
 * @see https://developer.apple.com/documentation/apple_news/promotearticleresponse
 */
class PromoteArticleResponse implements \JsonSerializable
{
    /**
     * List of URLs for the promoted articles.
     * @var string[]
     */
    protected $promotedArticles;

    public function __construct(array $data = [])
    {
        if (isset($data['promotedArticles'])) {
            $this->setPromotedArticles($data['promotedArticles']);
        }
    }

    /**
     * Get the promotedArticles
     * @return string[]
     */
    public function getPromotedArticles()
    {
        return $this->promotedArticles;
    }

    /**
     * Set the promotedArticles
     * @param string[] $promotedArticles
     * @return $this
     */
    public function setPromotedArticles($promotedArticles)
    {
        Assert::isArray($promotedArticles);
        Assert::allString($promotedArticles);

        $this->promotedArticles = $promotedArticles;
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
        $data = [];
        if (isset($this->promotedArticles)) {
            $data['promotedArticles'] = $this->promotedArticles;
        }
        return $data;
    }
}
