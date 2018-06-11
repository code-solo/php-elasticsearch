<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\DateHistogram;

use CodeSolo\Elasticsearch\Api\AggregationsType;
use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\AbstractRequest;

class Request extends AbstractRequest
{
    /**
     * @var string
     */
    private $field;

    /**
     * @var string
     */
    private $interval;

    /**
     * @var string
     */
    private $format;

    /**
     * @var string
     */
    private $timeZone;

    /**
     * @var string
     */
    private $offset;

    /**
     * @var bool
     */
    private $keyed;

    /**
     * @var string
     */
    private $missing;

    /**
     * @var int
     */
    private $minDocCount;

    /**
     * @var Request\ExtendedBounds
     */
    private $extendedBounds;

    /**
     * @inheritdoc
     */
    public function getType(): string
    {
        return AggregationsType::BUCKET_DATE_HISTOGRAM;
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
        if (!is_null($this->format)) {
            $dsl['format'] = $this->format;
        }
        if (!is_null($this->timeZone)) {
            $dsl['time_zone'] = $this->timeZone;
        }
        if (!is_null($this->offset)) {
            $dsl['offset'] = $this->offset;
        }
        if (!is_null($this->keyed)) {
            $dsl['keyed'] = $this->keyed;
        }
        if (!is_null($this->missing)) {
            $dsl['missing'] = $this->missing;
        }
        if (!is_null($this->minDocCount)) {
            $dsl['min_doc_count'] = $this->minDocCount;
        }
        if (!is_null($this->extendedBounds)) {
            $dsl['extended_bounds'] = $this->extendedBounds->toDsl();
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
     * @param string $interval
     * @return static
     */
    public function setInterval(string $interval): Request
    {
        $this->interval = $interval;
        return $this;
    }

    /**
     * @param string $format
     * @return static
     */
    public function setFormat(string $format): Request
    {
        $this->format = $format;
        return $this;
    }

    /**
     * @param string $timeZone
     * @return static
     */
    public function setTimeZone(string $timeZone): Request
    {
        $this->timeZone = $timeZone;
        return $this;
    }

    /**
     * @param string $offset
     * @return static
     */
    public function setOffset(string $offset): Request
    {
        $this->offset = $offset;
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
     * @param string $missing
     * @return static
     */
    public function setMissing(string $missing): Request
    {
        $this->missing = $missing;
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
}