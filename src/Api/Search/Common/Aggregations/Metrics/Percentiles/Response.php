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
     * @inheritdoc
     */
    public static function fromRawData(array $data): Response
    {
        if (!array_key_exists('values', $data)) {
            throw new InvalidRawData();
        }
        $instance = new static();
        foreach ($data['values'] as $key => $value) {
            if (is_array($value)) {
                $instance->values[] = Response\Value::fromRawData($value);

            } else {
                $instance->values[$key] = $value;
            }
        }
        return $instance;
    }

    /**
     * @inheritdoc
     */
    public function toRawData(): array
    {
        $values = [];
        foreach ($this->values as $key => $value) {
            if ($value instanceof Response\Value) {
                $values[] = $value->toRawData();

            } else {
                $values[$key] = $value;
            }
        }
        return [
            'values' => $values,
        ];
    }

    /**
     * @return float[]|Response\Value[]
     */
    public function getValues(): array
    {
        return $this->values;
    }
}