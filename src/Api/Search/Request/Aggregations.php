<?php

namespace CodeSolo\Elasticsearch\Api\Search\Request;

use CodeSolo\Elasticsearch\Api\Search\Aggregations\AbstractRequest;

class Aggregations
{
    /**
     * @var AbstractRequest[]
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
     * @param AbstractRequest $item
     * @return static
     */
    public function add(AbstractRequest $item): Aggregations
    {
        $this->items[] = $item;
        return $this;
    }
}