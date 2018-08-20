<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\Terms;

use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\AbstractResponse;
use CodeSolo\Elasticsearch\Exception\InvalidRawData;

class Response extends AbstractResponse
{
    /**
     * @var int
     */
    private $docCountErrorUpperBound;

    /**
     * @var int
     */
    private $sumOtherDocCount;

    /**
     * @var Response\Bucket[]
     */
    private $buckets = [];

    /**
     * @inheritdoc
     */
    public static function fromRawData(array $data): Response
    {
        if (!array_key_exists('doc_count_error_upper_bound', $data) ||
            !array_key_exists('sum_other_doc_count', $data) ||
            !array_key_exists('buckets', $data)
        ) {
            throw new InvalidRawData();
        }
        $instance = new static();
        $instance->docCountErrorUpperBound = $data['doc_count_error_upper_bound'];
        $instance->sumOtherDocCount = $data['sum_other_doc_count'];
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
            'doc_count_error_upper_bound' => $this->docCountErrorUpperBound,
            'sum_other_doc_count' => $this->sumOtherDocCount,
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