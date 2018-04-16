<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\Compound\FunctionScore;

use CodeSolo\Elasticsearch\Api\AbstractRequest;
use CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\AbstractClause;

class Func extends AbstractRequest
{
    /**
     * @var AbstractClause[]
     */
    private $filterClauses = [];

    /**
     * @var int
     */
    private $weight;

    /**
     * @return array
     */
    public function toDsl(): array
    {
        $dsl = parent::toDsl();
        if ($this->filterClauses) {
            $dsl['filter'] = $this->clausesToDsl($this->filterClauses);
        }
        if (!is_null($this->weight)) {
            $dsl['weight'] = $this->weight;
        }
        return $dsl;
    }

    /**
     * @param AbstractClause $clause
     * @return Func|static
     */
    public function addToFilter(AbstractClause $clause): Func
    {
        $this->filterClauses[] = $clause;
        return $this;
    }

    /**
     * @param int $weight
     * @return Func|static
     */
    public function setWeight(int $weight): Func
    {
        $this->weight = $weight;
        return $this;
    }

    /**
     * @param AbstractClause[] $clauses
     * @return array
     */
    private function clausesToDsl(array $clauses): array
    {
        if (count($clauses) === 1) {
            return $clauses[0]->toDsl();
        }
        return array_map(function (AbstractClause $clause) {
            return $clause->toDsl();
        }, $clauses);
    }
}