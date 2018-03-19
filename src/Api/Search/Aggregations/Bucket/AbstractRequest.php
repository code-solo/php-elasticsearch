<?php

namespace CodeSolo\Elasticsearch\Api\Search\Aggregations\Bucket;

use CodeSolo\Elasticsearch\Api\Search\Aggregations\AbstractRequest as Base;
use CodeSolo\Elasticsearch\Api\Search\Request\Aggregations;

abstract class AbstractRequest extends Base
{
    /**
     * @var Aggregations|null
     */
    protected $aggregations;

    /**
     * @return array
     */
    public function toDsl(): array
    {
        $dsl = parent::toDsl();
        if ($this->aggregations) {
            $dsl['aggregations'] = $this->aggregations->toDsl();
        }
        return $dsl;
    }

    /**
     * @param AbstractRequest $item
     * @return static
     */
    public function addAggregationsItem(AbstractRequest $item): AbstractRequest
    {
        $this->aggregations = $this->aggregations ?? new Aggregations();
        $this->aggregations->addItem($item);
        return $this;
    }
}