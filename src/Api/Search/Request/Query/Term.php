<?php

namespace CodeSolo\Elasticsearch\Api\Search\Request\Query;

use CodeSolo\Elasticsearch\Api\QueryType;

class Term extends AbstractClause
{
    /**
     * @inheritdoc
     */
    protected function getType(): string
    {
        return QueryType::TERM;
    }

    /**
     * @inheritdoc
     */
    protected function getBody(): array
    {

    }
}