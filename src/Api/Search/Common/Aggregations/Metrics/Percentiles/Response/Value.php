<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Metrics\Percentiles\Response;

use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\AbstractResponse;
use CodeSolo\Elasticsearch\Exception\InvalidRawData;

class Value extends AbstractResponse
{
    /**
     * @var float
     */
    private $value;

    /**
     * @var float
     */
    private $key;

    /**
     * @inheritdoc
     */
    public static function fromRawData(array $data): Value
    {
        if (!array_key_exists('value', $data) ||
            !array_key_exists('key', $data)
        ) {
            throw new InvalidRawData();
        }
        $instance = new static();
        $instance->value = $data['value'];
        $instance->key = $data['key'];
        return $instance;
    }

    /**
     * @inheritdoc
     */
    public function toRawData(): array
    {
        return [
            'key' => $this->key,
            'value' => $this->value,
        ];
    }

    /**
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }

    /**
     * @return float
     */
    public function getKey(): float
    {
        return $this->key;
    }
}