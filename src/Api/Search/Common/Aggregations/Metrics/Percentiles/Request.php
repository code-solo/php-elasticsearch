<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Metrics\Percentiles;

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
     * @var float[]
     */
    private $percents;

    /**
     * @var bool
     */
    private $keyed;

    /**
     * @var Request\TDigest
     */
    private $tDigest;

    /**
     * @var Request\Hdr
     */
    private $hdr;

    /**
     * @var float
     */
    private $missing;

    /**
     * @var Script
     */
    private $script;

    /**
     * @inheritdoc
     */
    public function getType(): string
    {
        return AggregationsType::METRICS_PERCENTILES;
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
        if (!is_null($this->percents)) {
            $dsl['percents'] = $this->percents;
        }
        if (!is_null($this->keyed)) {
            $dsl['keyed'] = $this->keyed;
        }
        if (!is_null($this->tDigest)) {
            $dsl['tdigest'] = $this->tDigest->toDsl();
        }
        if (!is_null($this->hdr)) {
            $dsl['hdr'] = $this->hdr->toDsl();
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
     * @return static
     */
    public function setField(string $field): Request
    {
        $this->field = $field;
        return $this;
    }

    /**
     * @param float[] $percents
     * @return static
     */
    public function setPercents(array $percents): Request
    {
        $this->percents = $percents;
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
     * @param Request\TDigest $tDigest
     * @return static
     */
    public function setTDigest(Request\TDigest $tDigest): Request
    {
        $this->tDigest = $tDigest;
        return $this;
    }

    /**
     * @param Request\Hdr $hdr
     * @return static
     */
    public function setHdr(Request\Hdr $hdr): Request
    {
        $this->hdr = $hdr;
        return $this;
    }

    /**
     * @param float $missing
     * @return static
     */
    public function setMissing(float $missing): Request
    {
        $this->missing = $missing;
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