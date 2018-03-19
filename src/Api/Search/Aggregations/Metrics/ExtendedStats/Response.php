<?php

namespace CodeSolo\Elasticsearch\Api\Search\Aggregations\Metrics\ExtendedStats;

use CodeSolo\Elasticsearch\Api\Search\Aggregations\AbstractResponse;
use CodeSolo\Elasticsearch\Exception\InvalidRawData;

class Response extends AbstractResponse
{
    /**
     * @param array $data
     * @return Response|static
     * @throws InvalidRawData
     */
    public static function fromRawData(array $data): Response
    {
        if (!array_key_exists('count', $data) ||
            !array_key_exists('min', $data) ||
            !array_key_exists('max', $data) ||
            !array_key_exists('avg', $data) ||
            !array_key_exists('sum', $data) ||
            !array_key_exists('sum_of_squares', $data) ||
            !array_key_exists('variance', $data) ||
            !array_key_exists('std_deviation', $data) ||
            !array_key_exists('std_deviation_bounds', $data)
        ) {
            throw new InvalidRawData();
        }
        $instance = new static();
        return $instance;
    }
}