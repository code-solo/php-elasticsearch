<?php

namespace CodeSolo\Elasticsearch\Api\Search\Aggregations;

use CodeSolo\Elasticsearch\Api\Search\Response\Aggregations;

trait HasAggregationsTrait
{
    /**
     * @var Aggregations
     */
    private $aggregations;

    /**
     * @return Aggregations
     */
    public function getAggregations()
    {
        if (!$this->aggregations) {
            $this->aggregations = Aggregations::fromRawData([]);
        }
        return $this->aggregations;
    }

    /**
     * @param array $data
     */
    private function setAggregations(array $data)
    {
        $this->aggregations = Aggregations::fromRawData($data);
    }
}