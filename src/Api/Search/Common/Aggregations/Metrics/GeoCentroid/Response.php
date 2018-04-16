<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Metrics\GeoCentroid;

use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\AbstractResponse;
use CodeSolo\Elasticsearch\Exception\InvalidRawData;

class Response extends AbstractResponse
{
    /**
     * @var Response\Location
     */
    private $location;

    /**
     * @var int
     */
    private $count;

    /**
     * @param array $data
     * @return Response|static
     * @throws InvalidRawData
     */
    public static function fromRawData(array $data): Response
    {
        if (!array_key_exists('location', $data) ||
            !array_key_exists('count', $data)
        ) {
            throw new InvalidRawData();
        }
        $instance = new static();
        $instance->location = Response\Location::fromRawData($data['location']);
        return $instance;
    }

    /**
     * @return Response\Location
     */
    public function getLocation(): Response\Location
    {
        return $this->location;
    }

    /**
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }
}