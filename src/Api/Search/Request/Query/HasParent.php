<?php

namespace CodeSolo\Elasticsearch\Api\Search\Request\Query;

use CodeSolo\Elasticsearch\Api\QueryType;

class HasParent extends AbstractClause
{
    /**
     * @var string
     */
    private $parentType;

    /**
     * @var bool
     */
    private $score;

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
        if (!is_null($this->parentType)) {
            $dsl['parent_type'] = $this->parentType;
        }
        if (!is_null($this->score)) {
            $dsl['score'] = $this->score;
        }
        if ($this->queryClauses) {
            $dsl['query'] = $this->clausesToDsl($this->queryClauses);
        }
        return $dsl;
    }

    /**
     * @param string $parentType
     * @return HasParent|static
     */
    public function setType(string $parentType): HasParent
    {
        $this->parentType = $parentType;
        return $this;
    }

    /**
     * @param bool $score
     * @return HasParent|static
     */
    public function setScore(bool $score): HasParent
    {
        $this->score = $score;
        return $this;
    }

    /**
     * @param AbstractClause $clause
     * @return HasParent|static
     */
    public function addToQuery(AbstractClause $clause): HasParent
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