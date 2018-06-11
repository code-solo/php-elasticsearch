<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\DateRange;

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
    private $format;

    /**
     * @var string
     */
    private $timeZone;

    /**
     * @var string
     */
    private $missing;

    /**
     * @var bool
     */
    private $keyed;

    /**
     * @var Request\Range[]
     */
    private $ranges;

    /**
     * @inheritdoc
     */
    public function getType(): string
    {
        return AggregationsType::BUCKET_DATE_RANGE;
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
        if (!is_null($this->format)) {
            $dsl['format'] = $this->format;
        }
        if (!is_null($this->timeZone)) {
            $dsl['time_zone'] = $this->timeZone;
        }
        if (!is_null($this->missing)) {
            $dsl['missing'] = $this->missing;
        }
        if (!is_null($this->keyed)) {
            $dsl['keyed'] = $this->keyed;
        }
        if (!is_null($this->ranges)) {
            $dsl['ranges'] = array_map(function (Request\Range $range) {
                return $range->toDsl();
            }, $this->ranges);
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
     * @param string $missing
     * @return static
     */
    public function setMissing(string $missing): Request
    {
        $this->missing = $missing;
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
}