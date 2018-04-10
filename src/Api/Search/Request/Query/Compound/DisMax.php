<?php

namespace CodeSolo\Elasticsearch\Api\Search\Request\Query\Compound;

use CodeSolo\Elasticsearch\Api\QueryType;
use CodeSolo\Elasticsearch\Api\Search\Request\Query\AbstractClause;

class DisMax extends AbstractClause
{
    /**
     * @var float
     */
    private $boost;

    /**
     * @var float
     */
    private $tieBreaker;

    /**
     * @var AbstractClause[]
     */
    private $queriesClauses = [];

    /**
     * @inheritdoc
     */
    protected function getType(): string
    {
        return QueryType::DIS_MAX;
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
        if (!is_null($this->tieBreaker)) {
            $dsl['tie_breaker'] = $this->tieBreaker;
        }
        if ($this->queriesClauses) {
            $dsl['queries'] = $this->clausesToDsl($this->queriesClauses);
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
     * @param float $tieBreaker
     * @return BoolQuery|static
     */
    public function setTieBreaker(float $tieBreaker): BoolQuery
    {
        $this->tieBreaker = $tieBreaker;
        return $this;
    }

    /**
     * @param AbstractClause $clause
     * @return BoolQuery|static
     */
    public function addToQueries(AbstractClause $clause): BoolQuery
    {
        $this->queriesClauses[] = $clause;
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