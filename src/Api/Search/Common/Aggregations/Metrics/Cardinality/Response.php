<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Metrics\Cardinality;

use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\AbstractResponse;
use CodeSolo\Elasticsearch\Exception\InvalidRawData;

class Response extends AbstractResponse
{
    /**
     * @var float
     */
    private $value;

    /**
     * @inheritdoc
     */
    public static function fromRawData(array $data): Response
    {
        if (!array_key_exists('value', $data)) {
            throw new InvalidRawData();
        }
        $instance = new static();
        $instance->value = $data['value'];
        return $instance;
    }

    /**
     * @inheritdoc
     */
    public function toRawData(): array
    {
        return [
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
}