<?php

namespace CodeSolo\Elasticsearch\Api\Search\Request\Query\Match;

class Message
{
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
     * @return array
     */
    public function toDsl(): array
    {
        $dsl = [];
        if (!is_null($this->query)) {
            $dsl['query'] = $this->query;
        }
        if (!is_null($this->operator)) {
            $dsl['operator'] = $this->operator;
        }
        if (!is_null($this->zeroTermsQuery)) {
            $dsl['zero_terms_query'] = $this->zeroTermsQuery;
        }
        if (!is_null($this->cutoffFrequency)) {
            $dsl['cutoff_frequency'] = $this->cutoffFrequency;
        }
        return $dsl;
    }

    /**
     * @param string $query
     * @return Message|static
     */
    public function setQuery(string $query): Message
    {
        $this->query = $query;
        return $this;
    }

    /**
     * @param string $operator
     * @return Message|static
     */
    public function setOperator(string $operator): Message
    {
        $this->operator = $operator;
        return $this;
    }

    /**
     * @param string $zeroTermsQuery
     * @return Message|static
     */
    public function setZeroTermsQuery(string $zeroTermsQuery): Message
    {
        $this->zeroTermsQuery = $zeroTermsQuery;
        return $this;
    }

    /**
     * @param float $cutoffFrequency
     * @return Message|static
     */
    public function setCutoffFrequency(float $cutoffFrequency): Message
    {
        $this->cutoffFrequency = $cutoffFrequency;
        return $this;
    }
}