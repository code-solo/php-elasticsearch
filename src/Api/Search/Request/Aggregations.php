<?php

namespace CodeSolo\Elasticsearch\Api\Search\Request;

use CodeSolo\Elasticsearch\Api\Search\Request\Aggregations\AbstractItem;

class Aggregations
{
    /**
     * @var AbstractItem[]
     */
    private $items = [];

    /**
     * @return array
     */
    public function toDsl(): array
    {
        $dsl = [];
        foreach ($this->items as $item) {
            $dsl[$item->getName()] = $item->toDsl();
        }
        return $dsl;
    }

    /**
     * @param AbstractItem $item
     * @return static
     */
    public function add(AbstractItem $item): Aggregations
    {
        $this->items[] = $item;
        return $this;
    }
}