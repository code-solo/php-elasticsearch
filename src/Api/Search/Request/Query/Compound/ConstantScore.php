<?php

namespace CodeSolo\Elasticsearch\Api\Search\Request\Query\Compound;

use CodeSolo\Elasticsearch\Api\QueryType;
use CodeSolo\Elasticsearch\Api\Search\Request\Query\AbstractClause;

class ConstantScore extends AbstractClause
{
    /**
     * @var float
     */
    private $boost;

    /**
     * @var AbstractClause[]
     */
    private $filterClauses = [];

    /**
     * @inheritdoc
     */
    protected function getType(): string
    {
        return QueryType::CONSTANT_SCORE;
    }

    /**
     * @inheritdoc
     */
    protected function getBody(): array
    {
        $dsl = [];
        if (!is_null($this->boost)) {
            $dsl['boost'] = $this->boost;
        }
        if ($this->filterClauses) {
            $dsl['filter'] = $this->clausesToDsl($this->filterClauses);
        }
        return $dsl;
    }

    /**
     * @param float $boost
     * @return BoolQuery|static
     */
    public function setBoost(float $boost): BoolQuery
    {
        $this->boost = $boost;
        return $this;
    }

    /**
     * @param AbstractClause $clause
     * @return BoolQuery|static
     */
    public function addToFilter(AbstractClause $clause): BoolQuery
    {
        $this->filterClauses[] = $clause;
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