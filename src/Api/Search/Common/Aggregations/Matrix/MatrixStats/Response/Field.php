<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Matrix\MatrixStats\Response;

use CodeSolo\Elasticsearch\Exception\InvalidRawData;

class Field
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $count;

    /**
     * @var float
     */
    private $mean;

    /**
     * @var float
     */
    private $variance;

    /**
     * @var float
     */
    private $skewness;

    /**
     * @var float
     */
    private $kurtosis;

    /**
     * @var float[]
     */
    private $covariance;

    /**
     * @var float[]
     */
    private $correlation;

    /**
     * @param array $data
     * @return Field|static
     * @throws InvalidRawData
     */
    public static function fromRawData(array $data): Field
    {
        if (!array_key_exists('name', $data) ||
            !array_key_exists('count', $data) ||
            !array_key_exists('mean', $data) ||
            !array_key_exists('variance', $data) ||
            !array_key_exists('skewness', $data) ||
            !array_key_exists('kurtosis', $data) ||
            !array_key_exists('covariance', $data) ||
            !array_key_exists('correlation', $data)
        ) {
            throw new InvalidRawData();
        }
        $instance = new static();
        $instance->name = $data['name'];
        $instance->count = $data['count'];
        $instance->mean = $data['mean'];
        $instance->variance = $data['variance'];
        $instance->skewness = $data['skewness'];
        $instance->kurtosis = $data['kurtosis'];
        $instance->covariance = $data['covariance'];
        $instance->correlation = $data['correlation'];
        return $instance;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
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
    public function getMean(): float
    {
        return $this->mean;
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
    public function getSkewness(): float
    {
        return $this->skewness;
    }

    /**
     * @return float
     */
    public function getKurtosis(): float
    {
        return $this->kurtosis;
    }

    /**
     * @return float[]
     */
    public function getCovariance(): array
    {
        return $this->covariance;
    }

    /**
     * @return float[]
     */
    public function getCorrelation(): array
    {
        return $this->correlation;
    }
}