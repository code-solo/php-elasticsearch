<?php

namespace CodeSolo\Elasticsearch\Api\Search\Request\Query;

use CodeSolo\Elasticsearch\Api\QueryType;

class MatchAll extends AbstractClause
{
    /**
     * @var float
     */
    private $boost;

    /**
     * @inheritdoc
     */
    protected function getType(): string
    {
        return QueryType::MATCH_ALL;
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
        return $dsl;
    }

    /**
     * @param float $boost
     * @return MatchAll|static
     */
    public function setBoost(float $boost): MatchAll
    {
        $this->boost = $boost;
        return $this;
    }
}