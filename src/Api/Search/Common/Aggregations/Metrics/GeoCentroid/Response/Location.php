<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Metrics\GeoCentroid\Response;

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
     * @inheritdoc
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
     * @inheritdoc
     */
    public function toRawData(): array
    {
        return [
            'lat' => $this->lat,
            'lon' => $this->lon,
        ];
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