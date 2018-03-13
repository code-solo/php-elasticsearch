<?php

namespace CodeSolo\Elasticsearch\Api\Search\Request\Aggregations;

use CodeSolo\Elasticsearch\Api\Search\Response\Aggregations;

abstract class AbstractItem
{
    /**
     * @var Aggregations|null
     */
    protected $aggregations;

    /**
     * @return string
     */
    abstract protected function getType(): string;

    /**
     * @return array
     */
    public function toDsl(): array
    {

    }

    /**
     * @return string
     */
    public function getName(): string
    {

    }

    /**
     * @param AbstractItem $item
     * @return static
     */
    public function add(AbstractItem $item): AbstractItem
    {
        return $this;
    }
}