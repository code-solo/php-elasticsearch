<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\Nested;

use CodeSolo\Elasticsearch\Api\AggregationsType;
use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\AbstractRequest;

class Request extends AbstractRequest
{
    /**
     * @var string
     */
    private $path;

    /**
     * @inheritdoc
     */
    public function getType(): string
    {
        return AggregationsType::BUCKET_NESTED;
    }

    /**
     * @inheritdoc
     */
    protected function getBody(): array
    {
        $dsl = [];
        if (!is_null($this->path)) {
            $dsl['path'] = $this->path;
        }
        return $dsl;
    }

    /**
     * @param string $path
     * @return static
     */
    public function setPath(string $path): Request
    {
        $this->path = $path;
        return $this;
    }
}