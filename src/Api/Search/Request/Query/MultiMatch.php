<?php

namespace CodeSolo\Elasticsearch\Api\Search\Request\Query;

use CodeSolo\Elasticsearch\Api\QueryType;

class MultiMatch extends AbstractClause
{
    /**
     * @var string
     */
    private $query;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string[]
     */
    private $fields;

    /**
     * @var float
     */
    private $tieBreaker;

    /**
     * @var string
     */
    private $operator;

    /**
     * @var string
     */
    private $minimumShouldMatch;

    /**
     * @var string
     */
    private $analyzer;

    /**
     * @inheritdoc
     */
    protected function getType(): string
    {
        return QueryType::MULTI_MATCH;
    }

    /**
     * @inheritdoc
     */
    protected function getBody(): array
    {
        $dsl = [];
        if (!is_null($this->query)) {
            $dsl['query'] = $this->query;
        }
        if (!is_null($this->type)) {
            $dsl['type'] = $this->type;
        }
        if (!is_null($this->fields)) {
            $dsl['fields'] = $this->fields;
        }
        if (!is_null($this->tieBreaker)) {
            $dsl['tie_breaker'] = $this->tieBreaker;
        }
        if (!is_null($this->operator)) {
            $dsl['operator'] = $this->operator;
        }
        if (!is_null($this->minimumShouldMatch)) {
            $dsl['minimum_should_match'] = $this->minimumShouldMatch;
        }
        if (!is_null($this->analyzer)) {
            $dsl['analyzer'] = $this->analyzer;
        }
        return $dsl;
    }

    /**
     * @param string $query
     * @return MultiMatch|static
     */
    public function setQuery(string $query): MultiMatch
    {
        $this->query = $query;
        return $this;
    }

    /**
     * @param string $type
     * @return MultiMatch|static
     */
    public function setType(string $type): MultiMatch
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @param string[] $fields
     * @return MultiMatch|static
     */
    public function setFields(array $fields): MultiMatch
    {
        $this->fields = $fields;
        return $this;
    }

    /**
     * @param float $tieBreaker
     * @return MultiMatch|static
     */
    public function setTieBreaker(float $tieBreaker): MultiMatch
    {
        $this->tieBreaker = $tieBreaker;
        return $this;
    }

    /**
     * @param string $operator
     * @return MultiMatch|static
     */
    public function setOperator(string $operator): MultiMatch
    {
        $this->operator = $operator;
        return $this;
    }

    /**
     * @param string $minimumShouldMatch
     * @return MultiMatch|static
     */
    public function setMinimumShouldMatch(string $minimumShouldMatch): MultiMatch
    {
        $this->minimumShouldMatch = $minimumShouldMatch;
        return $this;
    }

    /**
     * @param string $analyzer
     * @return MultiMatch|static
     */
    public function setAnalyzer(string $analyzer): MultiMatch
    {
        $this->analyzer = $analyzer;
        return $this;
    }
}