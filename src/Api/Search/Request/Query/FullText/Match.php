<?php

namespace CodeSolo\Elasticsearch\Api\Search\Request\Query\FullText;

use CodeSolo\Elasticsearch\Api\QueryType;
use CodeSolo\Elasticsearch\Api\Search\Request\Query\AbstractClause;

class Match extends AbstractClause
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
     * @var string
     */
    private $operator;

    /**
     * @var string
     */
    private $zeroTermsQuery;

    /**
     * @var float
     */
    private $cutoffFrequency;

    /**
     * Match constructor.
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
        return QueryType::MATCH;
    }

    /**
     * @inheritdoc
     */
    protected function getBody(): array
    {
        $dsl = [];
        if (!is_null($this->operator)) {
            $dsl['operator'] = $this->operator;
        }
        if (!is_null($this->zeroTermsQuery)) {
            $dsl['zero_terms_query'] = $this->zeroTermsQuery;
        }
        if (!is_null($this->cutoffFrequency)) {
            $dsl['cutoff_frequency'] = $this->cutoffFrequency;
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
     * @return Match|static
     */
    public function setQuery(string $query): Match
    {
        $this->query = $query;
        return $this;
    }

    /**
     * @param string $operator
     * @return Match|static
     */
    public function setOperator(string $operator): Match
    {
        $this->operator = $operator;
        return $this;
    }

    /**
     * @param string $zeroTermsQuery
     * @return Match|static
     */
    public function setZeroTermsQuery(string $zeroTermsQuery): Match
    {
        $this->zeroTermsQuery = $zeroTermsQuery;
        return $this;
    }

    /**
     * @param float $cutoffFrequency
     * @return Match|static
     */
    public function setCutoffFrequency(float $cutoffFrequency): Match
    {
        $this->cutoffFrequency = $cutoffFrequency;
        return $this;
    }
}