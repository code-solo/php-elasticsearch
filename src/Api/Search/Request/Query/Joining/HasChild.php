<?php

namespace CodeSolo\Elasticsearch\Api\Search\Request\Query\Joining;

use CodeSolo\Elasticsearch\Api\QueryType;
use CodeSolo\Elasticsearch\Api\Search\Request\Query\AbstractClause;

class HasChild extends AbstractClause
{
    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $scoreMode;

    /**
     * @var int
     */
    private $minChildren;

    /**
     * @var int
     */
    private $maxChildren;

    /**
     * @var AbstractClause[]
     */
    private $queryClauses = [];

    /**
     * @inheritdoc
     */
    protected function getType(): string
    {
        return QueryType::HAS_CHILD;
    }

    /**
     * @inheritdoc
     */
    protected function getBody(): array
    {
        $dsl = [];
        if (!is_null($this->type)) {
            $dsl['type'] = $this->type;
        }
        if (!is_null($this->scoreMode)) {
            $dsl['score_mode'] = $this->scoreMode;
        }
        if (!is_null($this->minChildren)) {
            $dsl['min_children'] = $this->minChildren;
        }
        if (!is_null($this->maxChildren)) {
            $dsl['max_children'] = $this->maxChildren;
        }
        if ($this->queryClauses) {
            $dsl['query'] = $this->clausesToDsl($this->queryClauses);
        }
        return $dsl;
    }

    /**
     * @param string $type
     * @return HasChild|static
     */
    public function setType(string $type): HasChild
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @param string $scoreMode
     * @return HasChild|static
     */
    public function setScoreMode(string $scoreMode): HasChild
    {
        $this->scoreMode = $scoreMode;
        return $this;
    }

    /**
     * @param int $minChildren
     * @return HasChild|static
     */
    public function setMinChildren(int $minChildren): HasChild
    {
        $this->minChildren = $minChildren;
        return $this;
    }

    /**
     * @param int $maxChildren
     * @return HasChild|static
     */
    public function setMaxChildren(int $maxChildren): HasChild
    {
        $this->maxChildren = $maxChildren;
        return $this;
    }

    /**
     * @param AbstractClause $clause
     * @return HasChild|static
     */
    public function addToQuery(AbstractClause $clause): HasChild
    {
        $this->queryClauses[] = $clause;
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