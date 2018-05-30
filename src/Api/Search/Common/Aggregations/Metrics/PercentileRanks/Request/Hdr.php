<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Metrics\PercentileRanks\Request;

use CodeSolo\Elasticsearch\Api\AbstractRequest;

class Hdr extends AbstractRequest
{
    /**
     * @var int
     */
    private $numberOfSignificantValueDigits;

    /**
     * @inheritdoc
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
     * @return static
     */
    public function setNumberOfSignificantValueDigits(int $numberOfSignificantValueDigits): Hdr
    {
        $this->numberOfSignificantValueDigits = $numberOfSignificantValueDigits;
        return $this;
    }
}