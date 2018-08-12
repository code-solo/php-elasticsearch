<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\Histogram\Response;

use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\AbstractResponse;
use CodeSolo\Elasticsearch\Exception\InvalidRawData;

class Bucket extends AbstractResponse
{
    /**
     * @var int
     */
    private $docCount;

    /**
     * @var float
     */
    private $key;

    /**
     * @inheritdoc
     */
    public static function fromRawData(array $data)
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
        $data = [
            'key' => $this->key,
            'doc_count' => $this->docCount,
        ];
        return $data;
    }

    /**
     * @return float
     */
    public function getKey(): float
    {
        return $this->key;
    }

    /**
     * @return int
     */
    public function getDocCount(): int
    {
        return $this->docCount;
    }
}