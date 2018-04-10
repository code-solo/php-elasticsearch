<?php

namespace CodeSolo\Elasticsearch\Api\Search\Request\Query\Joining;

use CodeSolo\Elasticsearch\Api\QueryType;
use CodeSolo\Elasticsearch\Api\Search\Request\Query\AbstractClause;

class Nested extends AbstractClause
{
    /**
     * @var string
     */
    private $path;

    /**
     * @var string
     */
    private $scoreMode;

    /**
     * @var AbstractClause[]
     */
    private $queryClauses = [];

    /**
     * @inheritdoc
     */
    protected function getType(): string
    {
        return QueryType::NESTED;
    }

    /**
     * @inheritdoc
     */
    protected function getBody(): array
    {
        $dsl = [];
        if (!is_null($this->path)) {
            $dsl['path'] = $this->path;
        }
        if (!is_null($this->scoreMode)) {
            $dsl['score_mode'] = $this->scoreMode;
        }
        if ($this->queryClauses) {
            $dsl['query'] = $this->clausesToDsl($this->queryClauses);
        }
        return $dsl;
    }

    /**
     * @param string $path
     * @return Nested|static
     */
    public function setPath(string $path): Nested
    {
        $this->path = $path;
        return $this;
    }

    /**
     * @param string $scoreMode
     * @return Nested|static
     */
    public function setScoreMode(string $scoreMode): Nested
    {
        $this->scoreMode = $scoreMode;
        return $this;
    }

    /**
     * @param AbstractClause $clause
     * @return Nested|static
     */
    public function addToQuery(AbstractClause $clause): Nested
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