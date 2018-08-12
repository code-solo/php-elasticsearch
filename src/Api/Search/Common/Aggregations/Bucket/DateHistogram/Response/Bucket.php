<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\DateHistogram\Response;

use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\AbstractResponse;
use CodeSolo\Elasticsearch\Exception\InvalidRawData;

class Bucket extends AbstractResponse
{
    /**
     * @var string
     */
    private $keyAsString;

    /**
     * @var int|string
     */
    private $key;

    /**
     * @var int
     */
    private $docCount;

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
        $instance->keyAsString = $data['key_as_string'] ?? null;
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
        if (!is_null($this->keyAsString)) {
            $data['key_as_string'] = $this->keyAsString;
        }
        return $data;
    }

    /**
     * @return string|null
     */
    public function getKeyAsString()
    {
        return $this->keyAsString;
    }

    /**
     * @return int|string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @return int
     */
    public function getDocCount()
    {
        return $this->docCount;
    }
}