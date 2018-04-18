<?php

namespace CodeSolo\Elasticsearch\Api\Search\Validate;

use CodeSolo\Elasticsearch\Api\Search\Common\Response\Shards;
use CodeSolo\Elasticsearch\Exception\InvalidRawData;

class Response
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
     * @param array $data
     * @return Response|static
     * @throws InvalidRawData
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
     * Response constructor.
     */
    private function __construct()
    {
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