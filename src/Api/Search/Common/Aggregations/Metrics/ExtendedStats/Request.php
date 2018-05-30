<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Metrics\ExtendedStats;

use CodeSolo\Elasticsearch\Api\Script;
use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\AbstractRequest;
use CodeSolo\Elasticsearch\Api\AggregationsType;

class Request extends AbstractRequest
{
    /**
     * @var string
     */
    private $field;

    /**
     * @var mixed
     */
    private $missing;

    /**
     * @var float
     */
    private $sigma;

    /**
     * @var Script
     */
    private $script;

    /**
     * @inheritdoc
     */
    public function getType(): string
    {
        return AggregationsType::METRICS_EXTENDED_STATS;
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
        if (!is_null($this->script)) {
            $dsl['script'] = $this->script->toDsl();
        }
        return $dsl;
    }

    /**
     * @param string $field
     * @return static
     */
    public function setField(string $field): Request
    {
        $this->field = $field;
        return $this;
    }

    /**
     * @param $missing
     * @return static
     */
    public function setMissing($missing): Request
    {
        $this->missing = $missing;
        return $this;
    }

    /**
     * @param float $sigma
     * @return static
     */
    public function setSigma(float $sigma): Request
    {
        $this->sigma = $sigma;
        return $this;
    }

    /**
     * @param Script $script
     * @return static
     */
    public function setScript(Script $script): Request
    {
        $this->script = $script;
        return $this;
    }
}