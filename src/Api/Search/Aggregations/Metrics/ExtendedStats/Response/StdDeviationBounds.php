<?php

namespace CodeSolo\Elasticsearch\Api\Search\Aggregations\Metrics\ExtendedStats\Response;

use CodeSolo\Elasticsearch\Exception\InvalidRawData;

class StdDeviationBounds
{
    /**
     * @var float
     */
    private $upper;

    /**
     * @var float
     */
    private $lower;

    /**
     * @param array $data
     * @return StdDeviationBounds|static
     * @throws InvalidRawData
     */
    public static function fromRawData(array $data): StdDeviationBounds
    {
        if (!array_key_exists('upper', $data) ||
            !array_key_exists('lower', $data)
        ) {
            throw new InvalidRawData();
        }
        $instance = new static();
        $instance->upper = $data['upper'];
        $instance->lower = $data['lower'];
        return $instance;
    }

    /**
     * @return float
     */
    public function getUpper(): float
    {
        return $this->upper;
    }

    /**
     * @return float
     */
    public function getLower(): float
    {
        return $this->lower;
    }
}