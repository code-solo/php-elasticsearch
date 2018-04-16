<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Metrics\GeoBounds\Response\Bounds;

use CodeSolo\Elasticsearch\Exception\InvalidRawData;

class Location
{
    /**
     * @var float
     */
    private $lat;

    /**
     * @var float
     */
    private $lon;

    /**
     * @param array $data
     * @return Location|static
     * @throws InvalidRawData
     */
    public static function fromRawData(array $data): Location
    {
        if (!array_key_exists('lat', $data) ||
            !array_key_exists('lon', $data)
        ) {
            throw new InvalidRawData();
        }
        $instance = new static();
        $instance->lat = $data['lat'];
        $instance->lon = $data['lon'];
        return $instance;
    }

    /**
     * @return float
     */
    public function getLat(): float
    {
        return $this->lat;
    }

    /**
     * @return float
     */
    public function getLon(): float
    {
        return $this->lon;
    }
}