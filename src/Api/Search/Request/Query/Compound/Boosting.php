<?php

namespace CodeSolo\Elasticsearch\Api\Search\Request\Query\Compound;

use CodeSolo\Elasticsearch\Api\QueryType;
use CodeSolo\Elasticsearch\Api\Search\Request\Query\AbstractClause;

class Boosting extends AbstractClause
{
    /**
     * @var float
     */
    private $negativeBoost;

    /**
     * @var AbstractClause[]
     */
    private $positiveClauses;

    /**
     * @var AbstractClause[]
     */
    private $negativeClauses;

    /**
     * @inheritdoc
     */
    protected function getType(): string
    {
        return QueryType::BOOSTING;
    }

    /**
     * @inheritdoc
     */
    protected function getBody(): array
    {
        $dsl = [];
        if (!is_null($this->negativeBoost)) {
            $dsl['negative_boost'] = $this->negativeBoost;
        }
        if ($this->positiveClauses) {
            $dsl['positive'] = $this->clausesToDsl($this->positiveClauses);
        }
        if ($this->negativeClauses) {
            $dsl['negative'] = $this->clausesToDsl($this->negativeClauses);
        }
        return $dsl;
    }

    /**
     * @param float $negativeBoost
     * @return Boosting|static
     */
    public function setNegativeBoost(float $negativeBoost): Boosting
    {
        $this->negativeBoost = $negativeBoost;
        return $this;
    }

    /**
     * @param AbstractClause $clause
     * @return Boosting|static
     */
    public function addToPositive(AbstractClause $clause): Boosting
    {
        $this->positiveClauses[] = $clause;
        return $this;
    }

    /**
     * @param AbstractClause $clause
     * @return Boosting|static
     */
    public function addToNegative(AbstractClause $clause): Boosting
    {
        $this->negativeClauses[] = $clause;
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