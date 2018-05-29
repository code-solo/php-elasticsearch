<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Metrics\ScriptedMetric;

use CodeSolo\Elasticsearch\Api\AggregationsType;
use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\AbstractRequest;

class Request extends AbstractRequest
{
    /**
     * @var string|Request\InitScript
     */
    private $initScript;

    /**
     * @var string|Request\MapScript
     */
    private $mapScript;

    /**
     * @var string|Request\CombineScript
     */
    private $combineScript;

    /**
     * @var string|Request\ReduceScript
     */
    private $reduceScript;

    /**
     * @var array
     */
    private $params;

    /**
     * @inheritdoc
     */
    public function getType(): string
    {
        return AggregationsType::METRICS_SCRIPTED_METRIC;
    }

    /**
     * @inheritdoc
     */
    protected function getBody(): array
    {
        $dsl = [];
        if (!is_null($this->initScript)) {
            $dsl['init_script'] = $this->initScript instanceof Request\InitScript ?
                $this->initScript->toDsl() : $this->initScript;
        }
        if (!is_null($this->mapScript)) {
            $dsl['map_script'] = $this->mapScript instanceof Request\MapScript ?
                $this->mapScript->toDsl() : $this->mapScript;
        }
        if (!is_null($this->combineScript)) {
            $dsl['combine_script'] = $this->combineScript instanceof Request\CombineScript ?
                $this->combineScript->toDsl() : $this->combineScript;
        }
        if (!is_null($this->reduceScript)) {
            $dsl['reduce_script'] = $this->reduceScript instanceof Request\ReduceScript ?
                $this->reduceScript->toDsl() : $this->reduceScript;
        }
        if (!is_null($this->params)) {
            $dsl['params'] = $this->params;
        }
        return $dsl;
    }

    /**
     * @param string|Request\InitScript $initScript
     * @return Request
     */
    public function setInitScript($initScript): Request
    {
        $this->initScript = $initScript;
        return $this;
    }

    /**
     * @param string|Request\MapScript $mapScript
     * @return Request
     */
    public function setMapScript($mapScript): Request
    {
        $this->mapScript = $mapScript;
        return $this;
    }

    /**
     * @param string|Request\CombineScript $combineScript
     * @return Request
     */
    public function setCombineScript($combineScript): Request
    {
        $this->combineScript = $combineScript;
        return $this;
    }

    /**
     * @param string|Request\ReduceScript $reduceScript
     * @return Request
     */
    public function setReduceScript($reduceScript): Request
    {
        $this->reduceScript = $reduceScript;
        return $this;
    }

    /**
     * @param array $params
     * @return Request
     */
    public function setParams(array $params): Request
    {
        $this->params = $params;
        return $this;
    }
}