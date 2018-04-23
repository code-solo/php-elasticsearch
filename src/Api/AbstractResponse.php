<?php

namespace CodeSolo\Elasticsearch\Api;

use CodeSolo\Elasticsearch\Exception\InvalidRawData;

abstract class AbstractResponse
{
    /**
     * @param array $data
     * @return static
     * @throws InvalidRawData
     */
    abstract public static function fromRawData(array $data);

    /**
     * @return array
     */
    abstract public function toRawData(): array;

    /**
     * AbstractResponse constructor.
     */
    protected function __construct()
    {
    }
}