<?php

namespace CodeSolo\Elasticsearch\Api\Search\Request\Query;

use CodeSolo\Elasticsearch\Api\QueryType;

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
    private $queries = [];

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
        if ($this->queries) {
            $dsl['queries'] = array_map(function (AbstractClause $clause) {
                return $clause->toDsl();
            }, $this->queries);
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
        $this->queries[] = $clause;
        return $this;
    }
}