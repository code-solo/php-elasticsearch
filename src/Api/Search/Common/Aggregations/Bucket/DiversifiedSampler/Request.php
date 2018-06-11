<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\DiversifiedSampler;

use CodeSolo\Elasticsearch\Api\AggregationsType;
use CodeSolo\Elasticsearch\Api\Script;
use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\AbstractRequest;

class Request extends AbstractRequest
{
    /**
     * @var string
     */
    private $field;

    /**
     * @var int
     */
    private $shardSize;

    /**
     * @var int
     */
    private $maxDocsPerValue;

    /**
     * @var Script
     */
    private $script;

    /**
     * @var string
     */
    private $executionHint;

    /**
     * @inheritdoc
     */
    public function getType(): string
    {
        return AggregationsType::BUCKET_DIVERSIFIED_SAMPLER;
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
        if (!is_null($this->shardSize)) {
            $dsl['shard_size'] = $this->shardSize;
        }
        if (!is_null($this->maxDocsPerValue)) {
            $dsl['max_docs_per_value'] = $this->maxDocsPerValue;
        }
        if (!is_null($this->script)) {
            $dsl['script'] = $this->script->toDsl();
        }
        if (!is_null($this->executionHint)) {
            $dsl['execution_hint'] = $this->executionHint;
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
     * @param int $shardSize
     * @return static
     */
    public function setShardSize(int $shardSize): Request
    {
        $this->shardSize = $shardSize;
        return $this;
    }

    /**
     * @param int $maxDocsPerValue
     * @return static
     */
    public function setMaxDocsPerValue(int $maxDocsPerValue): Request
    {
        $this->maxDocsPerValue = $maxDocsPerValue;
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

    /**
     * @param string $executionHint
     * @return static
     */
    public function setExecutionHint(string $executionHint): Request
    {
        $this->executionHint = $executionHint;
        return $this;
    }
}