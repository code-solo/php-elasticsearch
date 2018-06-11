<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\Terms;

use CodeSolo\Elasticsearch\Api\Script;
use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\AbstractRequest;
use CodeSolo\Elasticsearch\Api\AggregationsType;

class Request extends AbstractRequest
{
    /**
     * @var string
     */
    private $field;

    /**
     * @var int
     */
    private $size;

    /**
     * @var int
     */
    private $shardSize;

    /**
     * @var bool
     */
    private $showTermDocCountError;

    /**
     * @var int
     */
    private $minDocCount;

    /**
     * @var int
     */
    private $shardMinDocCount;

    /**
     * @var Script
     */
    private $script;

    /**
     * @var string|string[]|Request\Filter
     */
    private $include;

    /**
     * @var string|string[]|Request\Filter
     */
    private $exclude;

    /**
     * @var string
     */
    private $collectMode;

    /**
     * @var string
     */
    private $executionHint;

    /**
     * @var string
     */
    private $missing;

    /**
     * @inheritdoc
     */
    public function getType(): string
    {
        return AggregationsType::BUCKET_TERMS;
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
        if (!is_null($this->size)) {
            $dsl['size'] = $this->size;
        }
        if (!is_null($this->shardSize)) {
            $dsl['shard_size'] = $this->shardSize;
        }
        if (!is_null($this->showTermDocCountError)) {
            $dsl['show_term_doc_count_error'] = $this->showTermDocCountError;
        }
        if (!is_null($this->minDocCount)) {
            $dsl['min_doc_count'] = $this->minDocCount;
        }
        if (!is_null($this->shardMinDocCount)) {
            $dsl['shard_min_doc_count'] = $this->shardMinDocCount;
        }
        if (!is_null($this->script)) {
            $dsl['script'] = $this->script->toDsl();
        }
        if (!is_null($this->include)) {
            $dsl['include'] = $this->include instanceof Request\Filter ? $this->include->toDsl() : $this->include;
        }
        if (!is_null($this->exclude)) {
            $dsl['exclude'] = $this->exclude instanceof Request\Filter ? $this->exclude->toDsl() : $this->exclude;
        }
        if (!is_null($this->collectMode)) {
            $dsl['collect_mode'] = $this->collectMode;
        }
        if (!is_null($this->executionHint)) {
            $dsl['execution_hint'] = $this->executionHint;
        }
        if (!is_null($this->missing)) {
            $dsl['missing'] = $this->missing;
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
     * @param int $size
     * @return static
     */
    public function setSize(int $size): Request
    {
        $this->size = $size;
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
     * @param bool $showTermDocCountError
     * @return static
     */
    public function setShowTermDocCountError(bool $showTermDocCountError): Request
    {
        $this->showTermDocCountError = $showTermDocCountError;
        return $this;
    }

    /**
     * @param int $minDocCount
     * @return static
     */
    public function setMinDocCount(int $minDocCount): Request
    {
        $this->minDocCount = $minDocCount;
        return $this;
    }

    /**
     * @param int $shardMinDocCount
     * @return static
     */
    public function setShardMinDocCount(int $shardMinDocCount): Request
    {
        $this->shardMinDocCount = $shardMinDocCount;
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
     * @param string|string[]|Request\Filter $include
     * @return static
     */
    public function setInclude($include): Request
    {
        $this->include = $include;
        return $this;
    }

    /**
     * @param string|string[]|Request\Filter $exclude
     * @return static
     */
    public function setExclude($exclude): Request
    {
        $this->exclude = $exclude;
        return $this;
    }

    /**
     * @param string $collectMode
     * @return static
     */
    public function setCollectMode(string $collectMode): Request
    {
        $this->collectMode = $collectMode;
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

    /**
     * @param string $missing
     * @return static
     */
    public function setMissing(string $missing): Request
    {
        $this->missing = $missing;
        return $this;
    }
}