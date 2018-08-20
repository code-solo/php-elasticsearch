<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\Range;

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
        $buckets = [];
        foreach ($this->buckets as $key => $bucket) {
            $buckets[$key] = $bucket->toRawData();
        }
        return [
            'buckets' => $buckets,
        ];
    }

    /**
     * @return Response\Bucket[]
     */
    public function getBuckets(): array
    {
        return $this->buckets;
    }
}