<?php

namespace CodeSolo\Elasticsearch\Api\Search\Aggregations\Metrics\PercentileRanks\Request;

class Hdr
{
    /**
     * @var int
     */
    private $numberOfSignificantValueDigits;

    /**
     * @return array
     */
    public function toDsl(): array
    {
        $dsl = [];
        if (!is_null($this->numberOfSignificantValueDigits)) {
            $dsl['number_of_significant_value_digits'] = $this->numberOfSignificantValueDigits;
        }
        return $dsl;
    }

    /**
     * @param int $numberOfSignificantValueDigits
     * @return Hdr|static
     */
    public function setCompression(int $numberOfSignificantValueDigits): Hdr
    {
        $this->numberOfSignificantValueDigits = $numberOfSignificantValueDigits;
        return $this;
    }
}