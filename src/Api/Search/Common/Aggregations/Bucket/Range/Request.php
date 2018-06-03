<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\Range;

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
     * @var bool
     */
    private $keyed;

    /**
     * @var Request\Range[]
     */
    private $ranges;

    /**
     * @var Script
     */
    private $script;

    /**
     * @inheritdoc
     */
    public function getType(): string
    {
        return AggregationsType::BUCKET_RANGE;
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
        if (!is_null($this->keyed)) {
            $dsl['keyed'] = $this->keyed;
        }
        if (!is_null($this->ranges)) {
            $dsl['ranges'] = array_map(function (Request\Range $range) {
                return $range->toDsl();
            }, $this->ranges);
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
     * @param bool $keyed
     * @return static
     */
    public function setKeyed(bool $keyed): Request
    {
        $this->keyed = $keyed;
        return $this;
    }

    /**
     * @param Request\Range[] $ranges
     * @return static
     */
    public function setRanges(array $ranges): Request
    {
        $this->ranges = $ranges;
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