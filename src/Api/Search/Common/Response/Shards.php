<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Response;

use CodeSolo\Elasticsearch\Exception\InvalidRawData;

class Shards
{
    /**
     * @var int
     */
    private $total;

    /**
     * @var int
     */
    private $successful;

    /**
     * @var int
     */
    private $skipped;

    /**
     * @var int
     */
    private $failed;

    /**
     * @param array $data
     * @return Shards|static
     * @throws InvalidRawData
     */
    public static function fromRawData(array $data): Shards
    {
        if (!array_key_exists('total', $data) ||
            !array_key_exists('successful', $data) ||
            !array_key_exists('skipped', $data) ||
            !array_key_exists('failed', $data)
        ) {
            throw new InvalidRawData();
        }
        $instance = new static();
        $instance->total = $data['total'];
        $instance->successful = $data['successful'];
        $instance->skipped = $data['skipped'];
        $instance->failed = $data['failed'];
        return $instance;
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
    public function getSuccessful(): int
    {
        return $this->successful;
    }

    /**
     * @return int
     */
    public function getSkipped(): int
    {
        return $this->skipped;
    }

    /**
     * @return int
     */
    public function getFailed(): int
    {
        return $this->failed;
    }
}