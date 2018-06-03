<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\GlobalAggs;

use CodeSolo\Elasticsearch\Api\AggregationsType;
use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\AbstractRequest;

class Request extends AbstractRequest
{
    /**
     * @inheritdoc
     */
    public function getType(): string
    {
        return AggregationsType::BUCKET_GLOBAL;
    }

    /**
     * @inheritdoc
     */
    protected function getBody(): array
    {
        return [];
    }
}