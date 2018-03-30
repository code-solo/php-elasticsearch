<?php

namespace CodeSolo\Elasticsearch\Api\Search\Request;

use CodeSolo\Elasticsearch\Api\AbstractRequest as Base;
use CodeSolo\Elasticsearch\Api\Search\Aggregations\AbstractRequest;

class Aggregations extends Base
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
        $dsl = parent::toDsl();
        foreach ($this->items as $item) {
            $dsl[$item->getName()] = $item->toDsl();
        }
        return $dsl;
    }

    /**
     * @param AbstractRequest $item
     * @return static
     */
    public function addItem(AbstractRequest $item): Aggregations
    {
        $this->items[] = $item;
        return $this;
    }

    /**
     * @return AbstractRequest[]
     */
    public function getItems(): array
    {
        return $this->items;
    }
}