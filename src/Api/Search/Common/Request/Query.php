<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Request;

use CodeSolo\Elasticsearch\Api\AbstractRequest;

class Query extends AbstractRequest
{
    /**
     * @var Query\AbstractClause[]
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
     * @param Query\AbstractClause $clause
     * @return Query|static
     */
    public function addClause(Query\AbstractClause $clause): Query
    {
        $this->clauses[] = $clause;
        return $this;
    }
}