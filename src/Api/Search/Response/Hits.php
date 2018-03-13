<?php

namespace MySpot\Elasticsearch\Driver\Api\Search\Response;

use MySpot\Elasticsearch\Driver\Exception\InvalidRawData;

class Hits
{
    /**
     * @var int
     */
    private $total;

    /**
     * @var array
     */
    private $hits = [];

    /**
     * @param array $data
     * @return Hits|static
     * @throws InvalidRawData
     */
    public static function fromRawData(array $data): Hits
    {
        if (!array_key_exists('total', $data) ||
            !array_key_exists('hits', $data)
        ) {
            throw new InvalidRawData();
        }
        $instance = new static();
        $instance->total = $data['total'];
        $instance->hits = $data['hits'];
        return $instance;
    }

    /**
     * Total number of documents matching our search criteria.
     *
     * @return int
     */
    public function getTotal(): int
    {
        return $this->total;
    }

    /**
     * Actual array of search results (defaults to first 10 documents)
     *
     * @return array
     */
    public function getHits(): array
    {
        return $this->hits;
    }
}