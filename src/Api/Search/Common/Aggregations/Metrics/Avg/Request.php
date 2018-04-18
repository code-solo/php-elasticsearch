<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Metrics\Avg;

use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\AbstractRequest;
use CodeSolo\Elasticsearch\Api\Script;
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
     * @var Script|null
     */
    private $script;

    /**
     * @inheritdoc
     */
    public function getType(): string
    {
        return AggregationsType::METRICS_AVG;
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
        if (!is_null($this->script)) {
            $dsl['script'] = $this->script->toDsl();
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
     * @param Script $script
     * @return Response|static
     */
    public function setScript(Script $script): Response
    {
        $this->script = $script;
        return $this;
    }
}