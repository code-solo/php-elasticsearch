<?php

namespace CodeSolo\Elasticsearch\Api\Search\Aggregations\Bucket\AdjacencyMatrix\Response;

use CodeSolo\Elasticsearch\Exception\InvalidRawData;

class Bucket
{
    /**
     * @var int
     */
    private $key;

    /**
     * @var int
     */
    private $docCount;

    /**
     * @param array $data
     * @return Bucket|static
     * @throws InvalidRawData
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
        return $instance;
    }
}