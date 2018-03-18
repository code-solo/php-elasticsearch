<?php

namespace CodeSolo\Elasticsearch\Api\Search\Aggregations\Bucket\Terms\Response;

use CodeSolo\Elasticsearch\Api\Search\Aggregations\HasAggregationsTrait;
use CodeSolo\Elasticsearch\Exception\InvalidRawData;

class Bucket
{
    use HasAggregationsTrait;

    /**
     * @var int
     */
    private $key;

    /**
     * @var int
     */
    private $docCount;

    /**
     * @inheritdoc
     */
    public static function fromRawData(array $data): Bucket
    {
        if (!array_key_exists('key', $data) ||
            !array_key_exists('doc_count', $data)
        ) {
            throw new InvalidRawData();
        }
        $instance = new static();
        $instance->key = $data['key'];
        $instance->docCount = $data['doc_count'];
        $instance->setAggregations($data);
        return $instance;
    }
}