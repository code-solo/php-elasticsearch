<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\Filters;

use CodeSolo\Elasticsearch\Api\AggregationsType;
use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\AbstractRequest;

class Request extends AbstractRequest
{
    /**
     * @var string
     */
    private $otherBucketKey;

    /**
     * @var Request\Filter[]
     */
    private $filters;

    /**
     * @inheritdoc
     */
    public function getType(): string
    {
        return AggregationsType::BUCKET_FILTERS;
    }

    /**
     * @inheritdoc
     */
    protected function getBody(): array
    {
        $dsl = [];
        if (!is_null($this->otherBucketKey)) {
            $dsl['other_bucket_key'] = $this->otherBucketKey;
        }
        if (!is_null($this->filters)) {
            $dsl['filters'] = [];
            foreach ($this->filters as $filter) {
                $name = $filter->getName();
                if (!is_null($name)) {
                    $dsl['filters'][$name] = $filter->toDsl();

                } else {
                    $dsl['filters'][] = $filter->toDsl();
                }
            }
        }
        return $dsl;
    }

    /**
     * @param string $otherBucketKey
     * @return static
     */
    public function setOtherBucketKey(string $otherBucketKey): Request
    {
        $this->otherBucketKey = $otherBucketKey;
        return $this;
    }

    /**
     * @param Request\Filter[] $filters
     * @return static
     */
    public function setFilters(array $filters): Request
    {
        $this->filters = $filters;
        return $this;
    }
}