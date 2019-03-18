<?php

namespace Urbania\AppleNews\Format;

use Carbon\Carbon;
use Urbania\AppleNews\Assert;

/**
 * The component for setting apart content that is not directly related
 * to the article, such as promotional content.
 *
 * @see https://developer.apple.com/documentation/apple_news/aside
 */
class Aside extends Component
{
    /**
     * An array of ComponentLink objects. This can be used to create a
     * ComponentLink, allowing a link to anywhere in News. Adding a link to
     * an aside component will make the entire component interactable. Any
     * links used in its child components will no longer be interactable.
     * @var Format\ComponentLink[]
     */
    protected $additions;

    /**
     * An array of components to display as child components. Child
     * components are positioned and rendered relative to their parent
     * component.
     * @var Format\Component[]
     */
    protected $components;

    /**
     * Defines how child components are positioned within this aside
     * component. For example, this property can allow for displaying child
     * components side-by-side and can make sure they are sized equally.
     * @var \Urbania\AppleNews\Format\CollectionDisplay
     */
    protected $contentDisplay;

    /**
     * This component always has a role of aside.
     * @var string
     */
    protected $role = 'aside';

    public function __construct(array $data = [])
    {
        parent::__construct($data);

        if (isset($data['additions'])) {
            $this->setAdditions($data['additions']);
        }

        if (isset($data['components'])) {
            $this->setComponents($data['components']);
        }

        if (isset($data['contentDisplay'])) {
            $this->setContentDisplay($data['contentDisplay']);
        }
    }

    /**
     * Get the additions
     * @return Format\ComponentLink[]
     */
    public function getAdditions()
    {
        return $this->additions;
    }

    /**
     * Get the components
     * @return Format\Component[]
     */
    public function getComponents()
    {
        return $this->components;
    }

    /**
     * Get the contentDisplay
     * @return \Urbania\AppleNews\Format\CollectionDisplay
     */
    public function getContentDisplay()
    {
        return $this->contentDisplay;
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
     * Set the additions
     * @param Format\ComponentLink[] $additions
     * @return $this
     */
    public function setAdditions($additions)
    {
        Assert::isArray($additions);
        Assert::allIsInstanceOfOrArray($additions, ComponentLink::class);

        $items = [];
        foreach ($additions as $key => $item) {
            $items[$key] = is_array($item) ? new ComponentLink($item) : $item;
        }
        $this->additions = $items;
        return $this;
    }

    /**
     * Set the components
     * @param Format\Component[] $components
     * @return $this
     */
    public function setComponents($components)
    {
        Assert::isArray($components);
        Assert::allIsInstanceOfOrArray($components, Component::class);

        $items = [];
        foreach ($components as $key => $item) {
            $items[$key] = is_array($item)
                ? Component::createTyped($item)
                : $item;
        }
        $this->components = $items;
        return $this;
    }

    /**
     * Set the contentDisplay
     * @param \Urbania\AppleNews\Format\CollectionDisplay|array $contentDisplay
     * @return $this
     */
    public function setContentDisplay($contentDisplay)
    {
        if (is_object($contentDisplay)) {
            Assert::isInstanceOf($contentDisplay, CollectionDisplay::class);
        } else {
            Assert::isArray($contentDisplay);
        }

        $this->contentDisplay = is_array($contentDisplay)
            ? new CollectionDisplay($contentDisplay)
            : $contentDisplay;
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
        if (isset($this->additions)) {
            $data['additions'] = !is_null($this->additions)
                ? array_reduce(
                    array_keys($this->additions),
                    function ($items, $key) {
                        $items[$key] = is_object($this->additions[$key])
                            ? $this->additions[$key]->toArray()
                            : $this->additions[$key];
                        return $items;
                    },
                    []
                )
                : $this->additions;
        }
        if (isset($this->components)) {
            $data['components'] = !is_null($this->components)
                ? array_reduce(
                    array_keys($this->components),
                    function ($items, $key) {
                        $items[$key] = is_object($this->components[$key])
                            ? $this->components[$key]->toArray()
                            : $this->components[$key];
                        return $items;
                    },
                    []
                )
                : $this->components;
        }
        if (isset($this->contentDisplay)) {
            $data['contentDisplay'] = is_object($this->contentDisplay)
                ? $this->contentDisplay->toArray()
                : $this->contentDisplay;
        }
        if (isset($this->role)) {
            $data['role'] = $this->role;
        }
        return $data;
    }
}
