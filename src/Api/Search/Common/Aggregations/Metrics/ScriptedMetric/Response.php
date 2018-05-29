<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Metrics\ScriptedMetric;

use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\AbstractResponse;
use CodeSolo\Elasticsearch\Exception\InvalidRawData;

class Response extends AbstractResponse
{
    /**
     * @var mixed
     */
    private $value;

    /**
     * @inheritdoc
     */
    public static function fromRawData(array $data)
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
        // TODO: Implement toRawData() method.
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }
}