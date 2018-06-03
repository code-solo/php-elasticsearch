<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\Sampler;

use CodeSolo\Elasticsearch\Api\AggregationsType;
use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\AbstractRequest;

class Request extends AbstractRequest
{
    /**
     * @var int
     */
    private $shardSize;

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
        if (!is_null($this->shardSize)) {
            $dsl['shard_size'] = $this->shardSize;
        }
        return $dsl;
    }

    /**
     * @param int $shardSize
     * @return static
     */
    public function setPath(int $shardSize): Request
    {
        $this->shardSize = $shardSize;
        return $this;
    }
}