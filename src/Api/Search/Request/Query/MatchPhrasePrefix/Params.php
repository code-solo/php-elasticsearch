<?php

namespace CodeSolo\Elasticsearch\Api\Search\Request\Query\MatchPhrasePrefix;

class Params
{
    /**
     * @var string
     */
    private $query;

    /**
     * @var int
     */
    private $maxExpansions;

    /**
     * @return array
     */
    public function toDsl(): array
    {
        $dsl = [];
        if (!is_null($this->query)) {
            $dsl['query'] = $this->query;
        }
        if (!is_null($this->maxExpansions)) {
            $dsl['max_expansions'] = $this->maxExpansions;
        }
        return $dsl;
    }

    /**
     * @param string $query
     * @return Params|static
     */
    public function setQuery(string $query): Params
    {
        $this->query = $query;
        return $this;
    }

    /**
     * @param int $maxExpansions
     * @return Params|static
     */
    public function setMaxExpansions(int $maxExpansions): Params
    {
        $this->maxExpansions = $maxExpansions;
        return $this;
    }
}