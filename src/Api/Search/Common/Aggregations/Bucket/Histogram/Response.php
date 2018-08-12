<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\Histogram;

use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\AbstractResponse;
use CodeSolo\Elasticsearch\Exception\InvalidRawData;

class Response extends AbstractResponse
{
    /**
     * @var Response\Bucket[]
     */
    private $buckets = [];

    /**
     * @inheritdoc
     */
    public static function fromRawData(array $data)
    {
        if (false) {
            throw new InvalidRawData();
        }
        $instance = new static();
        foreach ($data['buckets'] as $key => $bucket) {
            $instance->buckets[$key] = Response\Bucket::fromRawData($bucket);
        }
        return $instance;
    }

    /**
     * @inheritdoc
     */
    public function toRawData(): array
    {
        $data = [];
        foreach ($this->buckets as $key => $bucket) {
            $data[$key] = $bucket->toRawData();
        }
        return $data;
    }

    /**
     * @return Response\Bucket[]
     */
    public function getBuckets(): array
    {
        return $this->buckets;
    }
}