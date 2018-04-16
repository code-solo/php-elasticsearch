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
     * @param array $data
     * @return Response
     * @throws InvalidRawData
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
     * @return Response\Bucket[]
     */
    public function getBuckets(): array
    {
        return $this->buckets;
    }
}