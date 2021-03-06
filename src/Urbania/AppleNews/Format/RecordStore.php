<?php

namespace Urbania\AppleNews\Format;

use Illuminate\Contracts\Support\Arrayable;
use Urbania\AppleNews\Support\Assert;
use Urbania\AppleNews\Support\BaseSdkObject;

/**
 * The object that contains JSON data for a data table.
 *
 * @see https://developer.apple.com/documentation/apple_news/recordstore
 */
class RecordStore extends BaseSdkObject
{
    /**
     * An object that provides information about the data that can be in each
     * data record.
     * @var Format\DataDescriptor[]
     */
    protected $descriptors;

    /**
     * An object that provides data records that fit within the structure
     * defined by descriptors. Each descriptor can be used only once per
     * record.
     * @var Format\Records[]
     */
    protected $records;

    public function __construct(array $data = [])
    {
        if (isset($data['descriptors'])) {
            $this->setDescriptors($data['descriptors']);
        }

        if (isset($data['records'])) {
            $this->setRecords($data['records']);
        }
    }

    /**
     * Add an item to descriptors
     * @param \Urbania\AppleNews\Format\DataDescriptor|array $item
     * @return $this
     */
    public function addDescriptor($item)
    {
        return $this->setDescriptors(
            !is_null($this->descriptors)
                ? array_merge($this->descriptors, [$item])
                : [$item]
        );
    }

    /**
     * Add items to descriptors
     * @param array $items
     * @return $this
     */
    public function addDescriptors($items)
    {
        Assert::isArray($items);
        return $this->setDescriptors(
            !is_null($this->descriptors)
                ? array_merge($this->descriptors, $items)
                : $items
        );
    }

    /**
     * Get the descriptors
     * @return Format\DataDescriptor[]
     */
    public function getDescriptors()
    {
        return $this->descriptors;
    }

    /**
     * Set the descriptors
     * @param Format\DataDescriptor[] $descriptors
     * @return $this
     */
    public function setDescriptors($descriptors)
    {
        Assert::isArray($descriptors);
        Assert::allIsSdkObject($descriptors, DataDescriptor::class);

        $this->descriptors = array_reduce(
            array_keys($descriptors),
            function ($array, $key) use ($descriptors) {
                $item = $descriptors[$key];
                $array[$key] = is_array($item)
                    ? new DataDescriptor($item)
                    : $item;
                return $array;
            },
            []
        );
        return $this;
    }

    /**
     * Add an item to records
     * @param \Urbania\AppleNews\Format\Records|array $item
     * @return $this
     */
    public function addRecord($item)
    {
        return $this->setRecords(
            !is_null($this->records)
                ? array_merge($this->records, [$item])
                : [$item]
        );
    }

    /**
     * Add items to records
     * @param array $items
     * @return $this
     */
    public function addRecords($items)
    {
        Assert::isArray($items);
        return $this->setRecords(
            !is_null($this->records)
                ? array_merge($this->records, $items)
                : $items
        );
    }

    /**
     * Get the records
     * @return Format\Records[]
     */
    public function getRecords()
    {
        return $this->records;
    }

    /**
     * Set the records
     * @param Format\Records[] $records
     * @return $this
     */
    public function setRecords($records)
    {
        Assert::isArray($records);
        Assert::allIsSdkObject($records, Records::class);

        $this->records = array_reduce(
            array_keys($records),
            function ($array, $key) use ($records) {
                $item = $records[$key];
                $array[$key] = is_array($item) ? new Records($item) : $item;
                return $array;
            },
            []
        );
        return $this;
    }

    /**
     * Get the object as array
     * @return array
     */
    public function toArray()
    {
        $data = [];
        if (isset($this->descriptors)) {
            $data['descriptors'] = !is_null($this->descriptors)
                ? array_reduce(
                    array_keys($this->descriptors),
                    function ($items, $key) {
                        $items[$key] =
                            $this->descriptors[$key] instanceof Arrayable
                                ? $this->descriptors[$key]->toArray()
                                : $this->descriptors[$key];
                        return $items;
                    },
                    []
                )
                : $this->descriptors;
        }
        if (isset($this->records)) {
            $data['records'] = !is_null($this->records)
                ? array_reduce(
                    array_keys($this->records),
                    function ($items, $key) {
                        $items[$key] =
                            $this->records[$key] instanceof Arrayable
                                ? $this->records[$key]->toArray()
                                : $this->records[$key];
                        return $items;
                    },
                    []
                )
                : $this->records;
        }
        return $data;
    }
}
