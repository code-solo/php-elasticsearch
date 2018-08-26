<?php

namespace CodeSolo\Elasticsearch\Api\Doc\Delete\Response;

use CodeSolo\Elasticsearch\Api\AbstractResponse;
use CodeSolo\Elasticsearch\Exception\InvalidRawData;

class Shards extends AbstractResponse
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
     * @inheritdoc
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
     * @inheritdoc
     */
    public function toRawData(): array
    {
        return [
            'total' => $this->total,
            'failed' => $this->failed,
            'successful' => $this->successful,
        ];
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