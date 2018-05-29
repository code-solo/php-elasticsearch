<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Metrics\ExtendedStats;

use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\AbstractResponse;
use CodeSolo\Elasticsearch\Exception\InvalidRawData;

class Response extends AbstractResponse
{
    /**
     * @var float
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
     * @var float
     */
    private $sumOfSquares;

    /**
     * @var float
     */
    private $variance;

    /**
     * @var float
     */
    private $stdDeviation;

    /**
     * @var Response\StdDeviationBounds
     */
    private $stdDeviationBounds;

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
            !array_key_exists('sum', $data) ||
            !array_key_exists('sum_of_squares', $data) ||
            !array_key_exists('variance', $data) ||
            !array_key_exists('std_deviation', $data) ||
            !array_key_exists('std_deviation_bounds', $data)
        ) {
            throw new InvalidRawData();
        }
        $instance = new static();
        $instance->count = $data['count'];
        $instance->min = $data['min'];
        $instance->max = $data['max'];
        $instance->avg = $data['avg'];
        $instance->sum = $data['sum'];
        $instance->sumOfSquares = $data['sum_of_squares'];
        $instance->variance = $data['variance'];
        $instance->stdDeviation = $data['std_deviation'];
        $instance->stdDeviationBounds = Response\StdDeviationBounds
            ::fromRawData($data['std_deviation_bounds']);
        return $instance;
    }

    /**
     * @inheritdoc
     */
    public function toRawData(): array
    {
        return [
            'count' => $this->count,
            'min' => $this->min,
            'max' => $this->max,
            'avg' => $this->avg,
            'sum' => $this->sum,
            'sum_of_squares' => $this->sumOfSquares,
            'variance' => $this->variance,
            'std_deviation' => $this->stdDeviation,
            'std_deviation_bounds' => $this->stdDeviationBounds->toRawData(),
        ];
    }

    /**
     * @return float
     */
    public function getCount(): float
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

    /**
     * @return float
     */
    public function getSumOfSquares(): float
    {
        return $this->sumOfSquares;
    }

    /**
     * @return float
     */
    public function getVariance(): float
    {
        return $this->variance;
    }

    /**
     * @return float
     */
    public function getStdDeviation(): float
    {
        return $this->stdDeviation;
    }

    /**
     * @return Response\StdDeviationBounds
     */
    public function getStdDeviationBounds(): Response\StdDeviationBounds
    {
        return $this->stdDeviationBounds;
    }
}