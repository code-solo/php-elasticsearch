<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Metrics\ExtendedStats\Response;

use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\AbstractResponse;
use CodeSolo\Elasticsearch\Exception\InvalidRawData;

class StdDeviationBounds extends AbstractResponse
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
     * @inheritdoc
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
     * @inheritdoc
     */
    public function toRawData(): array
    {
        return [
            'upper' => $this->upper,
            'lower' => $this->lower,
        ];
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