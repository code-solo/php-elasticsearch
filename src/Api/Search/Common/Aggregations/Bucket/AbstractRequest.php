<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket;

use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\AbstractRequest as Base;
use CodeSolo\Elasticsearch\Api\Search\Common\Request\Aggregations;

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
     * @param Base $item
     * @return static
     */
    public function addAggregationsItem(Base $item): AbstractRequest
    {
        $this->aggregations = $this->aggregations ?? new Aggregations();
        $this->aggregations->addItem($item);
        return $this;
    }
}