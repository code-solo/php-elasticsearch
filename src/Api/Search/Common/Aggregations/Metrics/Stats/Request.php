<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Metrics\Stats;

use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\AbstractRequest;
use CodeSolo\Elasticsearch\Api\AggregationsType;

class Request extends AbstractRequest
{
    /**
     * @var string
     */
    private $field;

    /**
     * @var float
     */
    private $missing;

    /**
     * @inheritdoc
     */
    public function getType(): string
    {
        return AggregationsType::METRICS_STATS;
    }

    /**
     * @inheritdoc
     */
    protected function getBody(): array
    {
        $dsl = [];
        if (!is_null($this->field)) {
            $dsl['field'] = $this->field;
        }
        if (!is_null($this->missing)) {
            $dsl['missing'] = $this->missing;
        }
        return $dsl;
    }

    /**
     * @param string $field
     * @return Request|static
     */
    public function setField(string $field): Request
    {
        $this->field = $field;
        return $this;
    }

    /**
     * @param float $missing
     * @return Request|static
     */
    public function setMissing(float $missing): Request
    {
        $this->missing = $missing;
        return $this;
    }
}