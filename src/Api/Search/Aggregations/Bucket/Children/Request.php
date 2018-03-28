<?php

namespace CodeSolo\Elasticsearch\Api\Search\Aggregations\Bucket\Children;

use CodeSolo\Elasticsearch\Api\Search\Aggregations\Bucket\AbstractRequest;
use CodeSolo\Elasticsearch\Api\AggregationsType;

class Request extends AbstractRequest
{
    /**
     * @var
     */
    private $type;

    /**
     * @inheritdoc
     */
    public function getType(): string
    {
        return AggregationsType::BUCKET_CHILDREN;
    }

    /**
     * @inheritdoc
     */
    protected function getBody(): array
    {
        $dsl = [];
        if (!is_null($this->type)) {
            $dsl['type'] = $this->type;
        }
        return $dsl;
    }

    /**
     * @param string $type
     * @return Request|static
     */
    public function setType(string $type): Request
    {
        $this->type = $type;
        return $this;
    }
}