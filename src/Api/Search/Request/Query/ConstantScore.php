<?php

namespace CodeSolo\Elasticsearch\Api\Search\Request\Query;

use CodeSolo\Elasticsearch\Api\QueryType;

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
            if (count($this->filterClauses) === 1) {
                $dsl['filter'] = $this->filterClauses[0]->toDsl();
            }
            $dsl['filter'] = array_map(function (AbstractClause $clause) {
                return $clause->toDsl();
            }, $this->filterClauses);
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
}