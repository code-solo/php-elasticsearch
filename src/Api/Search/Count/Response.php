<?php

namespace CodeSolo\Elasticsearch\Api\Search\Count;

use CodeSolo\Elasticsearch\Api\AbstractResponse;
use CodeSolo\Elasticsearch\Api\Search\Common\Response\Shards;
use CodeSolo\Elasticsearch\Exception\InvalidRawData;

class Response extends AbstractResponse
{
    /**
     * @var int
     */
    private $count;

    /**
     * @var Shards
     */
    private $shards;

    /**
     * @inheritdoc
     */
    public static function fromRawData(array $data): Response
    {
        if (!array_key_exists('count', $data) ||
            !array_key_exists('_shards', $data)
        ) {
            throw new InvalidRawData();
        }
        $instance = new static();
        $instance->count = $data['count'];
        $instance->shards = Shards::fromRawData($data['_shards']);
        return $instance;
    }

    /**
     * @inheritdoc
     */
    public function toRawData(): array
    {
        return [
            'count' => $this->getCount(),
            '_shards' => $this->getShards()->toRawData(),
        ];
    }

    /**
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * @return Shards
     */
    public function getShards(): Shards
    {
        return $this->shards;
    }
}