<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Metrics\PercentileRanks;

use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\AbstractRequest;
use CodeSolo\Elasticsearch\Api\AggregationsType;

class Request extends AbstractRequest
{
    /**
     * @var string
     */
    private $field;

    /**
     * @var float[]
     */
    private $values;

    /**
     * @var bool
     */
    private $keyed;

    /**
     * @var Request\Hdr
     */
    private $hdr;

    /**
     * @var float
     */
    private $missing;

    /**
     * @inheritdoc
     */
    public function getType(): string
    {
        return AggregationsType::METRICS_PERCENTILE_RANKS;
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
        if (!is_null($this->values)) {
            $dsl['values'] = $this->values;
        }
        if (!is_null($this->keyed)) {
            $dsl['keyed'] = $this->keyed;
        }
        if (!is_null($this->hdr)) {
            $dsl['hdr'] = $this->hdr->toDsl();
        }
        if (!is_null($this->missing)) {
            $dsl['missing'] = $this->missing;
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
     * @param float[] $values
     * @return Request|static
     */
    public function setValues(array $values): Request
    {
        $this->values = $values;
        return $this;
    }

    /**
     * @param bool $keyed
     * @return Request|static
     */
    public function setKeyed(bool $keyed): Request
    {
        $this->keyed = $keyed;
        return $this;
    }

    /**
     * @param Request\Hdr $hdr
     * @return Request|static
     */
    public function setHdr(Request\Hdr $hdr): Request
    {
        $this->hdr = $hdr;
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
}