<?php

namespace MySpot\Elasticsearch\Driver\Api\MultiDoc\UpdateByQuery\Response;

use MySpot\Elasticsearch\Driver\Exception\InvalidRawData;

class Retries
{
    /**
     * @var int
     */
    private $bulk;

    /**
     * @var int
     */
    private $search;

    /**
     * @param array $data
     * @return static
     * @throws InvalidRawData
     */
    public static function fromRawData(array $data): Retries
    {
        if (!array_key_exists('bulk', $data) ||
            !array_key_exists('search', $data)
        ) {
            throw new InvalidRawData();
        }
        $instance = new static();
        $instance->bulk = $data['bulk'];
        $instance->search = $data['search'];
        return $instance;
    }

    /**
     * Retries constructor.
     */
    private function __construct()
    {
    }

    /**
     * @return int
     */
    public function getBulk(): int
    {
        return $this->bulk;
    }

    /**
     * @return int
     */
    public function getSearch(): int
    {
        return $this->search;
    }
}