<?php

namespace CodeSolo\Elasticsearch\Api\Search\Request\Query;

use CodeSolo\Elasticsearch\Api\QueryType;

class MatchNone extends AbstractClause
{
    /**
     * @inheritdoc
     */
    protected function getType(): string
    {
        return QueryType::MATCH_NONE;
    }

    /**
     * @inheritdoc
     */
    protected function getBody(): array
    {
        return [];
    }
}