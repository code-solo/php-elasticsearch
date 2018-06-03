<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\GeohashGrid;

use CodeSolo\Elasticsearch\Api\AggregationsType;
use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\AbstractRequest;

class Request extends AbstractRequest
{
    /**
     * @var string
     */
    private $field;

    /**
     * @var int
     */
    private $precision;

    /**
     * @var int
     */
    private $size;

    /**
     * @var int
     */
    private $shardSize;

    /**
     * @inheritdoc
     */
    public function getType(): string
    {
        return AggregationsType::BUCKET_GEOHASH_GRID;
    }

    /**
     * @inheritdoc
     */
    protected function getBody(): array
    {
        $dsl = [];
        if (!is_null($this->field)) {
            $dsl['field'] = $this->field;
        }
        if (!is_null($this->precision)) {
            $dsl['precision'] = $this->precision;
        }
        if (!is_null($this->size)) {
            $dsl['size'] = $this->size;
        }
        if (!is_null($this->shardSize)) {
            $dsl['shard_size'] = $this->shardSize;
        }
        return $dsl;
    }

    /**
     * @param string $field
     * @return static
     */
    public function setField(string $field): Request
    {
        $this->field = $field;
        return $this;
    }

    /**
     * @param int $precision
     * @return static
     */
    public function setPrecision(int $precision): Request
    {
        $this->precision = $precision;
        return $this;
    }

    /**
     * @param int $size
     * @return static
     */
    public function setSize(int $size): Request
    {
        $this->size = $size;
        return $this;
    }

    /**
     * @param int $shardSize
     * @return static
     */
    public function setShardSize(int $shardSize): Request
    {
        $this->shardSize = $shardSize;
        return $this;
    }
}