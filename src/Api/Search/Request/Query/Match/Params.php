<?php

namespace CodeSolo\Elasticsearch\Api\Search\Request\Query\Match;

use CodeSolo\Elasticsearch\Api\AbstractRequest;

class Params extends AbstractRequest
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
        $dsl = parent::toDsl();
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
     * @return Params|static
     */
    public function setQuery(string $query): Params
    {
        $this->query = $query;
        return $this;
    }

    /**
     * @param string $operator
     * @return Params|static
     */
    public function setOperator(string $operator): Params
    {
        $this->operator = $operator;
        return $this;
    }

    /**
     * @param string $zeroTermsQuery
     * @return Params|static
     */
    public function setZeroTermsQuery(string $zeroTermsQuery): Params
    {
        $this->zeroTermsQuery = $zeroTermsQuery;
        return $this;
    }

    /**
     * @param float $cutoffFrequency
     * @return Params|static
     */
    public function setCutoffFrequency(float $cutoffFrequency): Params
    {
        $this->cutoffFrequency = $cutoffFrequency;
        return $this;
    }
}