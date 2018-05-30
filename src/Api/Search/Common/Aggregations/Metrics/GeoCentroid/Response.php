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
     * @inheritdoc
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
        $instance->count = $data['count'];
        return $instance;
    }

    /**
     * @inheritdoc
     */
    public function toRawData(): array
    {
        return [
            'location' => $this->location->toRawData(),
            'count' => $this->count,
        ];
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