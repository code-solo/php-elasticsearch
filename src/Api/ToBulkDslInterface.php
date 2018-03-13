<?php

namespace MySpot\Elasticsearch\Driver\Api;

interface ToBulkDslInterface
{
    /**
     * @return array
     */
    public function toBulkDsl(): array;
}