<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\Histogram;

use CodeSolo\Elasticsearch\Api\AggregationsType;
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
    private $interval;

    /**
     * @var int
     */
    private $minDocCount;

    /**
     * @var Request\ExtendedBounds
     */
    private $extendedBounds;

    /**
     * @var bool
     */
    private $keyed;

    /**
     * @var mixed
     */
    private $missing;

    /**
     * @inheritdoc
     */
    public function getType(): string
    {
        return AggregationsType::BUCKET_HISTOGRAM;
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
        if (!is_null($this->interval)) {
            $dsl['interval'] = $this->interval;
        }
        if (!is_null($this->minDocCount)) {
            $dsl['min_doc_count'] = $this->minDocCount;
        }
        if (!is_null($this->extendedBounds)) {
            $dsl['extended_bounds'] = $this->extendedBounds->toDsl();
        }
        if (!is_null($this->keyed)) {
            $dsl['keyed'] = $this->keyed;
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
     * @param int $interval
     * @return static
     */
    public function setInterval(int $interval): Request
    {
        $this->interval = $interval;
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
     * @param Request\ExtendedBounds $extendedBounds
     * @return static
     */
    public function setExtendedBounds(Request\ExtendedBounds $extendedBounds): Request
    {
        $this->extendedBounds = $extendedBounds;
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
     * @param mixed $missing
     * @return static
     */
    public function setMissing($missing): Request
    {
        $this->missing = $missing;
        return $this;
    }
}