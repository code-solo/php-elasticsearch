<?php

namespace CodeSolo\Elasticsearch\Api\Search\Aggregations\Metrics\GeoBounds\Response;

use CodeSolo\Elasticsearch\Exception\InvalidRawData;

class Bounds
{
    /**
     * @var Bounds\Location
     */
    private $topLeft;

    /**
     * @var Bounds\Location
     */
    private $bottomRight;

    /**
     * @param array $data
     * @return Bounds|static
     * @throws InvalidRawData
     */
    public static function fromRawData(array $data): Bounds
    {
        if (!array_key_exists('top_left', $data) ||
            !array_key_exists('bottom_right', $data)
        ) {
            throw new InvalidRawData();
        }
        $instance = new static();
        $instance->topLeft = Bounds\Location::fromRawData($data['top_left']);
        $instance->bottomRight = Bounds\Location::fromRawData($data['bottom_right']);
        return $instance;
    }

    /**
     * @return Bounds\Location
     */
    public function getTopLeft(): Bounds\Location
    {
        return $this->topLeft;
    }

    /**
     * @return Bounds\Location
     */
    public function getBottomRight(): Bounds\Location
    {
        return $this->bottomRight;
    }
}