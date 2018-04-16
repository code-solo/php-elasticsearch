<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Metrics\Sum;

use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\AbstractResponse;
use CodeSolo\Elasticsearch\Exception\InvalidRawData;

class Response extends AbstractResponse
{
    /**
     * @var float
     */
    private $value;

    /**
     * @param array $data
     * @return Response|static
     * @throws InvalidRawData
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
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }
}