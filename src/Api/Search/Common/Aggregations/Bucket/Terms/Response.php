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
     * @param array $data
     * @return Response|static
     * @throws InvalidRawData
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