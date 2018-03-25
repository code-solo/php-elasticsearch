<?php

namespace CodeSolo\Elasticsearch\Api\Search\Request\Query;

class MatchAll
{
    /**
     * @var float
     */
    private $boost;

    /**
     * @return array
     */
    public function toDsl(): array
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