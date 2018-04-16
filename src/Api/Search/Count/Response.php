<?php

namespace CodeSolo\Elasticsearch\Api\Search\Count;

use CodeSolo\Elasticsearch\Exception\InvalidRawData;

class Response
{
    /**
     * @param array $data
     * @return Response|static
     * @throws InvalidRawData
     */
    public static function fromRawData(array $data): Response
    {
        if (!array_key_exists('count', $data) ||
            !array_key_exists('_shards', $data)
        ) {
            throw new InvalidRawData();
        }
        $instance = new static();
        return $instance;
    }
}