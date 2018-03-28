<?php

namespace CodeSolo\Elasticsearch\Api\Search\Aggregations\Metrics\ExtendedStats;

use CodeSolo\Elasticsearch\Api\Search\Aggregations\AbstractRequest;
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
     * @var float
     */
    private $sigma;

    /**
     * @inheritdoc
     */
    public function getType(): string
    {
        return AggregationsType::METRICS_CARDINALITY;
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
        if (!is_null($this->sigma)) {
            $dsl['sigma'] = $this->sigma;
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

    /**
     * @param float $sigma
     * @return Request|static
     */
    public function setSigma(float $sigma): Request
    {
        $this->sigma = $sigma;
        return $this;
    }
}