<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\AdjacencyMatrix;

use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\AbstractRequest;
use CodeSolo\Elasticsearch\Api\AggregationsType;

class Request extends AbstractRequest
{
    /**
     * @var array
     */
    private $filters;

    /**
     * @inheritdoc
     */
    public function getType(): string
    {
        return AggregationsType::BUCKET_ADJACENCY_MATRIX;
    }

    /**
     * @inheritdoc
     */
    protected function getBody(): array
    {
        $dsl = [];
        if (!is_null($this->filters)) {
            $dsl['filters'] = $this->filters;
        }
        return $dsl;
    }

    /**
     * @param array $filters
     * @return static
     */
    public function setFilters(array $filters): Request
    {
        $this->filters = $filters;
        return $this;
    }
}