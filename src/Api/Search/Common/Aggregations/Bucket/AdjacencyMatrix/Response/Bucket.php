<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\AdjacencyMatrix\Response;

use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\AbstractResponse;
use CodeSolo\Elasticsearch\Exception\InvalidRawData;

class Bucket extends AbstractResponse
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

    /**
     * @inheritdoc
     */
    public function toRawData(): array
    {
        return [
            'key' => $this->key,
            'doc_count' => $this->docCount,
        ];
    }
}