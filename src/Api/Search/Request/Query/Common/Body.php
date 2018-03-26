<?php

namespace CodeSolo\Elasticsearch\Api\Search\Request\Query\Common;

class Body
{
    /**
     * @var string
     */
    private $query;

    /**
     * @var float
     */
    private $cutoffFrequency;

    /**
     * @var string
     */
    private $lowFreqOperator;

    /**
     * @var Body\MinimumShouldMatch|int|string
     */
    private $minimumShouldMatch;

    /**
     * @return array
     */
    public function toDsl(): array
    {
        $dsl = [];
        if (!is_null($this->query)) {
            $dsl['query'] = $this->query;
        }
        if (!is_null($this->cutoffFrequency)) {
            $dsl['cutoff_frequency'] = $this->cutoffFrequency;
        }
        if (!is_null($this->lowFreqOperator)) {
            $dsl['low_freq_operator'] = $this->lowFreqOperator;
        }
        if (!is_null($this->minimumShouldMatch)) {
            $dsl['minimum_should_match'] = is_object($this->minimumShouldMatch)
                ? $this->minimumShouldMatch->toDsl() : $this->minimumShouldMatch;
        }
        return $dsl;
    }

    /**
     * @param string $query
     * @return Body|static
     */
    public function setQuery(string $query): Body
    {
        $this->query = $query;
        return $this;
    }

    /**
     * @param float $cutoffFrequency
     * @return Body|static
     */
    public function setCutoffFrequency(float $cutoffFrequency): Body
    {
        $this->cutoffFrequency = $cutoffFrequency;
        return $this;
    }

    /**
     * @param string $lowFreqOperator
     * @return Body|static
     */
    public function setLowFreqOperator(string $lowFreqOperator): Body
    {
        $this->lowFreqOperator = $lowFreqOperator;
        return $this;
    }

    /**
     * @param $minimumShouldMatch
     * @return Body|static
     */
    public function set($minimumShouldMatch): Body
    {
        $this->minimumShouldMatch = $minimumShouldMatch;
        return $this;
    }
}