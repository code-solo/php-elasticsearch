<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\FullText\Common;

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
            $dsl['minimum_should_match'] = $this->minimumShouldMatch instanceof Body\MinimumShouldMatch
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
     * @param Body\MinimumShouldMatch|int|string $minimumShouldMatch
     * @return Body|static
     */
    public function setMinimumShouldMatch($minimumShouldMatch): Body
    {
        $this->minimumShouldMatch = $minimumShouldMatch;
        return $this;
    }
}