<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\SignificantTerms;

use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\AbstractResponse;
use CodeSolo\Elasticsearch\Exception\InvalidRawData;

class Response extends AbstractResponse
{
    /**
     * @var int
     */
    private $docCount;

    /**
     * @var int
     */
    private $bgCount;

    /**
     * @var Response\Bucket[]
     */
    private $buckets = [];

    /**
     * @inheritdoc
     */
    public static function fromRawData(array $data)
    {
        if (!array_key_exists('doc_count', $data) ||
            !array_key_exists('bg_count', $data) ||
            !array_key_exists('buckets', $data)
        ) {
            throw new InvalidRawData();
        }
        $instance = new static();
        $instance->docCount = $data['doc_count'];
        $instance->bgCount = $data['bg_count'];
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
            'doc_count' => $this->docCount,
            'bg_count' => $this->bgCount,
            'buckets' => $buckets,
        ];
    }

    /**
     * @return int
     */
    public function getDocCount(): int
    {
        return $this->docCount;
    }

    /**
     * @return int
     */
    public function getBgCount(): int
    {
        return $this->bgCount;
    }

    /**
     * @return Response\Bucket[]
     */
    public function getBuckets(): array
    {
        return $this->buckets;
    }
}