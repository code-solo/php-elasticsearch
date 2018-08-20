<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\Range\Response;

use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\AbstractResponse;
use CodeSolo\Elasticsearch\Api\Search\Common\Response\Aggregations\HasAggregationsTrait;
use CodeSolo\Elasticsearch\Exception\InvalidRawData;

class Bucket extends AbstractResponse
{
    use HasAggregationsTrait;

    /**
     * @var int|float|null
     */
    private $from;

    /**
     * @var int|float|null
     */
    private $to;

    /**
     * @var int
     */
    private $docCount;

    /**
     * @var string|null
     */
    private $key;

    /**
     * @inheritdoc
     */
    public static function fromRawData(array $data)
    {
        if (!array_key_exists('doc_count', $data)) {
            throw new InvalidRawData();
        }
        $instance = new static();
        $instance->from = $data['from'] ?? null;
        $instance->to = $data['to'] ?? null;
        $instance->key = $data['key'] ?? null;
        $instance->docCount = $data['doc_count'];
        return $instance;
    }

    /**
     * @inheritdoc
     */
    public function toRawData(): array
    {
        $data = $this->getAggregations()->toRawData();
        $data['doc_count'] = $this->docCount;
        if (!is_null($this->from)) {
            $data['from'] = $this->from;
        }
        if (!is_null($this->to)) {
            $data['to'] = $this->to;
        }
        if (!is_null($this->key)) {
            $data['key'] = $this->key;
        }
        return $data;
    }

    /**
     * @return int|float|null
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @return int|float|null
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @return null|string
     */
    public function getKey()
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