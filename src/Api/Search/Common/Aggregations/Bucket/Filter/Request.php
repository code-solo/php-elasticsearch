<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\Filter;

use CodeSolo\Elasticsearch\Api\AggregationsType;
use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\AbstractRequest;

class Request extends AbstractRequest
{
    /**
     * @var Request\Filter
     */
    private $filter;

    /**
     * @inheritdoc
     */
    public function getType(): string
    {
        return AggregationsType::BUCKET_FILTER;
    }

    /**
     * @inheritdoc
     */
    protected function getBody(): array
    {
        return $this->filter->toDsl();
    }

    /**
     * @param Request\Filter $filter
     * @return static
     */
    public function setFilter(Request\Filter $filter): Request
    {
        $this->filter = $filter;
        return $this;
    }
}