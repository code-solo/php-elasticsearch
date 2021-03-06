<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\Terms\Response;

use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\AbstractResponse;
use CodeSolo\Elasticsearch\Api\Search\Common\Response\Aggregations\HasAggregationsTrait;
use CodeSolo\Elasticsearch\Exception\InvalidRawData;

class Bucket extends AbstractResponse
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

    /**
     * @inheritdoc
     */
    public function toRawData(): array
    {
        $data = $this->getAggregations()->toRawData();
        $data['key'] = $this->key;
        $data['doc_count'] = $this->docCount;
        return $data;
    }

    /**
     * @return string
     */
    public function getKey(): string
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