<?php

namespace Urbania\AppleNews\Format;

use Illuminate\Contracts\Support\Arrayable;
use Urbania\AppleNews\Support\Assert;
use Urbania\AppleNews\Support\BaseSdkObject;

/**
 * The object for defining conditional properties for a container
 * component, and when the conditional properties are in effect.
 *
 * @see https://developer.apple.com/documentation/apple_news/conditionalcontainer
 */
class ConditionalContainer extends BaseSdkObject
{
    /**
     * An array of conditions that, when met, cause the conditional container
     * properties to be in effect.
     * @var Format\Condition[]
     */
    protected $conditions;

    /**
     * An object that defines vertical alignment with another component.
     * @var \Urbania\AppleNews\Format\Anchor
     */
    protected $anchor;

    /**
     * An object that defines an animation to be applied to the component.
     * @var \Urbania\AppleNews\Format\ComponentAnimation
     */
    protected $animation;

    /**
     * An object that defines behavior for a component, like Parallax or
     * Springy.
     * @var \Urbania\AppleNews\Format\Behavior
     */
    protected $behavior;

    /**
     * A Boolean value that determines whether the component is hidden.
     * @var boolean
     */
    protected $hidden;

    /**
     * An inline ComponentLayout object that contains layout information, or
     * a string reference to a ComponentLayout object that is defined at the
     * top level of the document.
     * @var \Urbania\AppleNews\Format\ComponentLayout|string
     */
    protected $layout;

    /**
     * An inline ComponentStyle object that defines the appearance of this
     * component, or a string reference to a ComponentStyle that is defined
     * at the top level of the document.
     * @var \Urbania\AppleNews\Format\ComponentStyle|string
     */
    protected $style;

    public function __construct(array $data = [])
    {
        if (isset($data['conditions'])) {
            $this->setConditions($data['conditions']);
        }

        if (isset($data['anchor'])) {
            $this->setAnchor($data['anchor']);
        }

        if (isset($data['animation'])) {
            $this->setAnimation($data['animation']);
        }

        if (isset($data['behavior'])) {
            $this->setBehavior($data['behavior']);
        }

        if (isset($data['hidden'])) {
            $this->setHidden($data['hidden']);
        }

        if (isset($data['layout'])) {
            $this->setLayout($data['layout']);
        }

        if (isset($data['style'])) {
            $this->setStyle($data['style']);
        }
    }

    /**
     * Get the anchor
     * @return \Urbania\AppleNews\Format\Anchor
     */
    public function getAnchor()
    {
        return $this->anchor;
    }

    /**
     * Set the anchor
     * @param \Urbania\AppleNews\Format\Anchor|array $anchor
     * @return $this
     */
    public function setAnchor($anchor)
    {
        if (is_null($anchor)) {
            $this->anchor = null;
            return $this;
        }

        Assert::isSdkObject($anchor, Anchor::class);

        $this->anchor = is_array($anchor) ? new Anchor($anchor) : $anchor;
        return $this;
    }

    /**
     * Get the animation
     * @return \Urbania\AppleNews\Format\ComponentAnimation
     */
    public function getAnimation()
    {
        return $this->animation;
    }

    /**
     * Set the animation
     * @param \Urbania\AppleNews\Format\ComponentAnimation|array $animation
     * @return $this
     */
    public function setAnimation($animation)
    {
        if (is_null($animation)) {
            $this->animation = null;
            return $this;
        }

        Assert::isSdkObject($animation, ComponentAnimation::class);

        $this->animation = is_array($animation)
            ? ComponentAnimation::createTyped($animation)
            : $animation;
        return $this;
    }

    /**
     * Get the behavior
     * @return \Urbania\AppleNews\Format\Behavior
     */
    public function getBehavior()
    {
        return $this->behavior;
    }

    /**
     * Set the behavior
     * @param \Urbania\AppleNews\Format\Behavior|array $behavior
     * @return $this
     */
    public function setBehavior($behavior)
    {
        if (is_null($behavior)) {
            $this->behavior = null;
            return $this;
        }

        Assert::isSdkObject($behavior, Behavior::class);

        $this->behavior = is_array($behavior)
            ? Behavior::createTyped($behavior)
            : $behavior;
        return $this;
    }

    /**
     * Add an item to conditions
     * @param \Urbania\AppleNews\Format\Condition|array $item
     * @return $this
     */
    public function addCondition($item)
    {
        return $this->setConditions(
            !is_null($this->conditions)
                ? array_merge($this->conditions, [$item])
                : [$item]
        );
    }

    /**
     * Add items to conditions
     * @param array $items
     * @return $this
     */
    public function addConditions($items)
    {
        Assert::isArray($items);
        return $this->setConditions(
            !is_null($this->conditions)
                ? array_merge($this->conditions, $items)
                : $items
        );
    }

    /**
     * Get the conditions
     * @return Format\Condition[]
     */
    public function getConditions()
    {
        return $this->conditions;
    }

    /**
     * Set the conditions
     * @param Format\Condition[] $conditions
     * @return $this
     */
    public function setConditions($conditions)
    {
        Assert::isArray($conditions);
        Assert::allIsSdkObject($conditions, Condition::class);

        $this->conditions = array_reduce(
            array_keys($conditions),
            function ($array, $key) use ($conditions) {
                $item = $conditions[$key];
                $array[$key] = is_array($item) ? new Condition($item) : $item;
                return $array;
            },
            []
        );
        return $this;
    }

    /**
     * Get the hidden
     * @return boolean
     */
    public function getHidden()
    {
        return $this->hidden;
    }

    /**
     * Set the hidden
     * @param boolean $hidden
     * @return $this
     */
    public function setHidden($hidden)
    {
        if (is_null($hidden)) {
            $this->hidden = null;
            return $this;
        }

        Assert::boolean($hidden);

        $this->hidden = $hidden;
        return $this;
    }

    /**
     * Get the layout
     * @return \Urbania\AppleNews\Format\ComponentLayout|string
     */
    public function getLayout()
    {
        return $this->layout;
    }

    /**
     * Set the layout
     * @param \Urbania\AppleNews\Format\ComponentLayout|array|string $layout
     * @return $this
     */
    public function setLayout($layout)
    {
        if (is_null($layout)) {
            $this->layout = null;
            return $this;
        }

        if (is_object($layout) || is_array($layout)) {
            Assert::isSdkObject($layout, ComponentLayout::class);
        } else {
            Assert::string($layout);
        }

        $this->layout = is_array($layout)
            ? new ComponentLayout($layout)
            : $layout;
        return $this;
    }

    /**
     * Get the style
     * @return \Urbania\AppleNews\Format\ComponentStyle|string
     */
    public function getStyle()
    {
        return $this->style;
    }

    /**
     * Set the style
     * @param \Urbania\AppleNews\Format\ComponentStyle|array|string $style
     * @return $this
     */
    public function setStyle($style)
    {
        if (is_null($style)) {
            $this->style = null;
            return $this;
        }

        if (is_object($style) || is_array($style)) {
            Assert::isSdkObject($style, ComponentStyle::class);
        } else {
            Assert::string($style);
        }

        $this->style = is_array($style) ? new ComponentStyle($style) : $style;
        return $this;
    }

    /**
     * Get the object as array
     * @return array
     */
    public function toArray()
    {
        $data = [];
        if (isset($this->conditions)) {
            $data['conditions'] = !is_null($this->conditions)
                ? array_reduce(
                    array_keys($this->conditions),
                    function ($items, $key) {
                        $items[$key] =
                            $this->conditions[$key] instanceof Arrayable
                                ? $this->conditions[$key]->toArray()
                                : $this->conditions[$key];
                        return $items;
                    },
                    []
                )
                : $this->conditions;
        }
        if (isset($this->anchor)) {
            $data['anchor'] =
                $this->anchor instanceof Arrayable
                    ? $this->anchor->toArray()
                    : $this->anchor;
        }
        if (isset($this->animation)) {
            $data['animation'] =
                $this->animation instanceof Arrayable
                    ? $this->animation->toArray()
                    : $this->animation;
        }
        if (isset($this->behavior)) {
            $data['behavior'] =
                $this->behavior instanceof Arrayable
                    ? $this->behavior->toArray()
                    : $this->behavior;
        }
        if (isset($this->hidden)) {
            $data['hidden'] = $this->hidden;
        }
        if (isset($this->layout)) {
            $data['layout'] =
                $this->layout instanceof Arrayable
                    ? $this->layout->toArray()
                    : $this->layout;
        }
        if (isset($this->style)) {
            $data['style'] =
                $this->style instanceof Arrayable
                    ? $this->style->toArray()
                    : $this->style;
        }
        return $data;
    }
}
