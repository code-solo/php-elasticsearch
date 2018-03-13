<?php

namespace CodeSolo\Elasticsearch\Api\Search\Response;

class Aggregations
{
    /**
     * @param array $data
     * @return Aggregations|static
     */
    public static function fromRawData(array $data): Aggregations
    {
        $instance = new static();
        return $instance;
    }
}