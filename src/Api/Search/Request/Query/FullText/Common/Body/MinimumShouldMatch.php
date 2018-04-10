<?php

namespace CodeSolo\Elasticsearch\Api\Search\Request\Query\FullText\Common\Body;

class MinimumShouldMatch
{
    /**
     * @var int
     */
    private $lowFreq;

    /**
     * @var int
     */
    private $highFreq;

    /**
     * @return array
     */
    public function toDsl(): array
    {
        $dsl = [];
        if (!is_null($this->lowFreq)) {
            $dsl['low_freq'] = $this->lowFreq;
        }
        if (!is_null($this->highFreq)) {
            $dsl['high_freq'] = $this->highFreq;
        }
        return $dsl;
    }

    /**
     * @param int $lowFreq
     * @return MinimumShouldMatch|static
     */
    public function setLowFreq(int $lowFreq): MinimumShouldMatch
    {
        $this->lowFreq = $lowFreq;
        return $this;
    }

    /**
     * @param int $highFreq
     * @return MinimumShouldMatch|static
     */
    public function setHighFreq(int $highFreq): MinimumShouldMatch
    {
        $this->highFreq = $highFreq;
        return $this;
    }
}