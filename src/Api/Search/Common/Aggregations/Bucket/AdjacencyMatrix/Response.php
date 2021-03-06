<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\AdjacencyMatrix;

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
    public static function fromRawData(array $data): Response
    {
        if (!array_key_exists('buckets', $data)) {
            throw new InvalidRawData();
        }
        $instance = new static();
        foreach ($data['buckets'] as $bucket) {
            $instance->buckets[] = Response\Bucket::fromRawData($bucket);
        }
        return $instance;
    }

    /**
     * @inheritdoc
     */
    public function toRawData(): array
    {
        return [
            'buckets' => array_map(function(Response\Bucket $bucket) {
                return $bucket->toRawData();
            }, $this->buckets)
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