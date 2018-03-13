<?php

namespace CodeSolo\Elasticsearch\Api\MultiDoc\Bulk;

interface ToBulkDslInterface
{
    /**
     * @return array
     */
    public function toBulkDsl(): array;
}