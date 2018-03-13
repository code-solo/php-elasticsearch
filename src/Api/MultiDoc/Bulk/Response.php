<?php

namespace CodeSolo\Elasticsearch\Api\MultiDoc\Bulk;

use CodeSolo\Elasticsearch\Api\MultiDoc\Bulk\Response\Item;
use CodeSolo\Elasticsearch\Exception\InvalidRawData;

class Response
{
    /**
     * @var int
     */
    private $took;

    /**
     * @var bool
     */
    private $errors;

    /**
     * @var Item[]
     */
    private $items;

    /**
     * @param array $data
     * @return static
     * @throws InvalidRawData
     */
    public static function fromRawData(array $data): Response
    {
        if (!array_key_exists('took', $data) ||
            !array_key_exists('errors', $data) ||
            !array_key_exists('items', $data)
        ) {
            throw new InvalidRawData();
        }
        $instance = new static();
        $instance->took = $data['took'];
        $instance->errors = $data['errors'];
        foreach ($data['items'] as $itemData) {
            $item = Item::fromRawData(reset($itemData));
            $item->setAction(key($itemData));
            $instance->items[] = $item;
        }
        return $instance;
    }

    /**
     * @return int
     */
    public function getTook(): int
    {
        return $this->took;
    }

    /**
     * @return bool
     */
    public function getErrors(): bool
    {
        return $this->errors;
    }

    /**
     * @return Item[]
     */
    public function getItems(): array
    {
        return $this->items;
    }
}