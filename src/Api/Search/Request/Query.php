<?php

namespace CodeSolo\Elasticsearch\Api\Search\Request;

use CodeSolo\Elasticsearch\Api\AbstractRequest;
use CodeSolo\Elasticsearch\Api\Search\Request\Query\AbstractClause;

class Query extends AbstractRequest
{
    /**
     * @var AbstractClause[]
     */
    private $clauses = [];

    /**
     * @return array
     */
    public function toDsl(): array
    {
        $dsl = parent::toDsl();
        foreach ($this->clauses as $clause) {
            $dsl = array_merge($dsl, $clause->toDsl());
        }
        return $dsl;
    }

    /**
     * @param AbstractClause $clause
     * @return Query|static
     */
    public function addClause(AbstractClause $clause): Query
    {
        $this->clauses[] = $clause;
        return $this;
    }
}