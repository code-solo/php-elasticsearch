<?php

namespace CodeSolo\Elasticsearch\Api\Search\Request\Query;

use CodeSolo\Elasticsearch\Api\QueryType;

class BoolQuery extends AbstractClause
{
    /**
     * @var int
     */
    private $minimumShouldMatch;

    /**
     * @var float
     */
    private $boost;

    /**
     * @var AbstractClause[]
     */
    private $mustClauses = [];

    /**
     * @var AbstractClause[]
     */
    private $mustNotClauses = [];

    /**
     * @var AbstractClause[]
     */
    private $filterClauses = [];

    /**
     * @var AbstractClause[]
     */
    private $shouldClauses = [];

    /**
     * @inheritdoc
     */
    protected function getType(): string
    {
        return QueryType::BOOL;
    }

    /**
     * @inheritdoc
     */
    protected function getBody(): array
    {
        $dsl = [];
        if (!is_null($this->minimumShouldMatch)) {
            $dsl['minimum_should_match'] = $this->minimumShouldMatch;
        }
        if (!is_null($this->boost)) {
            $dsl['boost'] = $this->boost;
        }
        if ($this->mustClauses) {
            $dsl['must'] = $this->clausesToDsl($this->mustClauses);
        }
        if ($this->mustNotClauses) {
            $dsl['must_not'] = $this->clausesToDsl($this->mustNotClauses);
        }
        if ($this->filterClauses) {
            $dsl['filter'] = $this->clausesToDsl($this->filterClauses);
        }
        if ($this->shouldClauses) {
            $dsl['should'] = $this->clausesToDsl($this->shouldClauses);
        }
        return $dsl;
    }

    /**
     * @param int $minimumShouldMatch
     * @return BoolQuery|static
     */
    public function setMinimumShouldMatch(int $minimumShouldMatch): BoolQuery
    {
        $this->minimumShouldMatch = $minimumShouldMatch;
        return $this;
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
    public function addToMust(AbstractClause $clause): BoolQuery
    {
        $this->mustClauses[] = $clause;
        return $this;
    }

    /**
     * @param AbstractClause $clause
     * @return BoolQuery|static
     */
    public function addToMustNot(AbstractClause $clause): BoolQuery
    {
        $this->mustNotClauses[] = $clause;
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
     * @param AbstractClause $clause
     * @return BoolQuery|static
     */
    public function addToShould(AbstractClause $clause): BoolQuery
    {
        $this->shouldClauses[] = $clause;
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