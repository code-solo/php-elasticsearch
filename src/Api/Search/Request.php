<?php

namespace CodeSolo\Elasticsearch\Api\Search;

use CodeSolo\Elasticsearch\Api\Search\Request\Aggregations;
use CodeSolo\Elasticsearch\Api\Search\Request\Query;

class Request
{
    /**
     * @var int|null
     */
    private $from;

    /**
     * @var int|null
     */
    private $size;

    /**
     * @var Query|null
     */
    private $query;

    /**
     * @var Aggregations|null
     */
    private $aggregations;

    /**
     * @return array
     */
    public function toDsl(): array
    {
        $dsl = [];
        if (!is_null($this->from)) {
            $dsl['from'] = $this->from;
        }
        if (!is_null($this->size)) {
            $dsl['size'] = $this->size;
        }
        if ($this->query) {
            $dsl['query'] = $this->query->toDsl();
        }
        if ($this->aggregations) {
            $dsl['aggs'] = $this->aggregations->toDsl();
        }
        return $dsl;
    }

    /**
     * @param int $from
     * @return static
     */
    public function setFrom(int $from): Request
    {
        $this->from = $from;
        return $this;
    }

    /**
     * @param int $size
     * @return static
     */
    public function setSize(int $size): Request
    {
        $this->size = $size;
        return $this;
    }

    /**
     * @param Query $query
     * @return static
     */
    public function setQuery(Query $query): Request
    {
        $this->query = $query;
        return $this;
    }

    /**
     * @param Aggregations $aggregations
     * @return static
     */
    public function setAggregations(Aggregations $aggregations): Request
    {
        $this->aggregations = $aggregations;
        return $this;
    }
}