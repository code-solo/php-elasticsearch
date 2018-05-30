<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\Composite;

use CodeSolo\Elasticsearch\Api\AggregationsType;
use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\AbstractRequest;

class Request extends AbstractRequest
{
    /**
     * @inheritdoc
     */
    public function getType(): string
    {
        return AggregationsType::BUCKET_COMPOSITE;
    }

    /**
     * @inheritdoc
     */
    protected function getBody(): array
    {
        // TODO: Implement getBody() method.
    }
}