<?php

namespace MySpot\Elasticsearch\Driver\Api\Doc\Update\Response;

use MySpot\Elasticsearch\Driver\Exception\InvalidRawData;

class Shards
{
    /**
     * @var int
     */
    private $total;

    /**
     * @var int
     */
    private $failed;

    /**
     * @var int
     */
    private $successful;

    /**
     * @param array $data
     * @return static
     * @throws InvalidRawData
     */
    public static function fromRawData(array $data): Shards
    {
        if (!array_key_exists('total', $data) ||
            !array_key_exists('failed', $data) ||
            !array_key_exists('successful', $data)
        ) {
            throw new InvalidRawData();
        }
        $instance = new static();
        $instance->total = $data['total'];
        $instance->failed = $data['failed'];
        $instance->successful = $data['successful'];
        return $instance;
    }

    /**
     * Shards constructor.
     */
    private function __construct()
    {
    }

    /**
     * @return int
     */
    public function getTotal(): int
    {
        return $this->total;
    }

    /**
     * @return int
     */
    public function getFailed(): int
    {
        return $this->failed;
    }

    /**
     * @return int
     */
    public function getSuccessful(): int
    {
        return $this->successful;
    }
}