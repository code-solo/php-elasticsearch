<?php

namespace CodeSolo\Elasticsearch\Api\Search\Request\Query;

class MatchNone
{
    /**
     * @return array
     */
    public function toDsl(): array
    {
        return [];
    }
}