<?php

namespace CodeSolo\Elasticsearch\Api\Search\Validate;

use CodeSolo\Elasticsearch\Api\AbstractResponse;
use CodeSolo\Elasticsearch\Api\Search\Common\Response\Shards;
use CodeSolo\Elasticsearch\Exception\InvalidRawData;

class Response extends AbstractResponse
{
    /**
     * @var bool
     */
    private $valid;

    /**
     * @var Shards
     */
    private $shards;

    /**
     * @inheritdoc
     */
    public static function fromRawData(array $data): Response
    {
        if (!array_key_exists('valid', $data) ||
            !array_key_exists('_shards', $data)
        ) {
            throw new InvalidRawData();
        }
        $instance = new static();
        $instance->valid = $data['valid'];
        $instance->shards = Shards::fromRawData($data['_shards']);
        return $instance;
    }

    /**
     * @inheritdoc
     */
    public function toRawData(): array
    {
        return [
            'valid' => $this->getValid(),
            '_shards' => $this->getShards()->toRawData(),
        ];
    }

    /**
     * @return bool
     */
    public function getValid(): bool
    {
        return $this->valid;
    }

    /**
     * @return Shards
     */
    public function getShards(): Shards
    {
        return $this->shards;
    }
}