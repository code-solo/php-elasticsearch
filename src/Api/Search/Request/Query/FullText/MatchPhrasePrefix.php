<?php

namespace CodeSolo\Elasticsearch\Api\Search\Request\Query\FullText;

use CodeSolo\Elasticsearch\Api\QueryType;
use CodeSolo\Elasticsearch\Api\Search\Request\Query\AbstractClause;

class MatchPhrasePrefix extends AbstractClause
{
    /**
     * @var string
     */
    private $field;

    /**
     * @var string
     */
    private $query;

    /**
     * @var int
     */
    private $maxExpansions;

    /**
     * MatchPhrasePrefix constructor.
     * @param string $field
     */
    public function __construct(string $field)
    {
        $this->field = $field;
    }

    /**
     * @inheritdoc
     */
    protected function getType(): string
    {
        return QueryType::MATCH_PHRASE_PREFIX;
    }

    /**
     * @inheritdoc
     */
    protected function getBody(): array
    {
        $dsl = [];
        if (!is_null($this->maxExpansions)) {
            $dsl['max_expansions'] = $this->maxExpansions;
        }
        if ($dsl) {
            $dsl['query'] = $this->query;
        }
        return [
            $this->field => $dsl ? $dsl : $this->query
        ];
    }

    /**
     * @param string $query
     * @return MatchPhrasePrefix|static
     */
    public function setQuery(string $query): MatchPhrasePrefix
    {
        $this->query = $query;
        return $this;
    }

    /**
     * @param int $maxExpansions
     * @return MatchPhrasePrefix|static
     */
    public function setMaxExpansions(int $maxExpansions): MatchPhrasePrefix
    {
        $this->maxExpansions = $maxExpansions;
        return $this;
    }
}