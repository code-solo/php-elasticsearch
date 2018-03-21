<?php

namespace CodeSolo\Elasticsearch\Api\Search\Aggregations\Metrics\Stats;

use CodeSolo\Elasticsearch\Api\Search\Aggregations\AbstractResponse;
use CodeSolo\Elasticsearch\Exception\InvalidRawData;

class Response extends AbstractResponse
{
    /**
     * @var int
     */
    private $count;

    /**
     * @var float
     */
    private $min;

    /**
     * @var float
     */
    private $max;

    /**
     * @var float
     */
    private $avg;

    /**
     * @var float
     */
    private $sum;

    /**
     * @param array $data
     * @return Response|static
     * @throws InvalidRawData
     */
    public static function fromRawData(array $data): Response
    {
        if (!array_key_exists('count', $data) ||
            !array_key_exists('min', $data) ||
            !array_key_exists('max', $data) ||
            !array_key_exists('avg', $data) ||
            !array_key_exists('sum', $data)
        ) {
            throw new InvalidRawData();
        }
        $instance = new static();
        $instance->count = $data['count'];
        $instance->min = $data['min'];
        $instance->max = $data['max'];
        $instance->avg = $data['avg'];
        $instance->sum = $data['sum'];
        return $instance;
    }

    /**
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * @return float
     */
    public function getMin(): float
    {
        return $this->min;
    }

    /**
     * @return float
     */
    public function getMax(): float
    {
        return $this->max;
    }

    /**
     * @return float
     */
    public function getAvg(): float
    {
        return $this->avg;
    }

    /**
     * @return float
     */
    public function getSum(): float
    {
        return $this->sum;
    }
}