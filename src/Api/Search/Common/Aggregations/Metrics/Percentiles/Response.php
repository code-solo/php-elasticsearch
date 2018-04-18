<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Metrics\Percentiles;

use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\AbstractResponse;
use CodeSolo\Elasticsearch\Exception\InvalidRawData;

class Response extends AbstractResponse
{
    /**
     * @var float[]|Response\Value[]
     */
    private $values;

    /**
     * @param array $data
     * @return Response|static
     * @throws InvalidRawData
     */
    public static function fromRawData(array $data): Response
    {
        if (!array_key_exists('values', $data)) {
            throw new InvalidRawData();
        }
        $instance = new static();
        $instance->values = $data['values'];
        return $instance;
    }

    /**
     * @return float[]|Response\Value[]
     */
    public function getValues(): array
    {
        return $this->values;
    }
}