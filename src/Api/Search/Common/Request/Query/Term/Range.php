<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\Term;

use CodeSolo\Elasticsearch\Api\QueryType;
use CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\AbstractClause;

class Range extends AbstractClause
{
    /**
     * @var string
     */
    private $field;

    /**
     * @var string|int|float
     */
    private $gte;

    /**
     * @var string|int|float
     */
    private $lte;

    /**
     * @var string|int|float
     */
    private $gt;

    /**
     * @var string|int|float
     */
    private $lt;

    /**
     * @var float
     */
    private $boost;

    /**
     * @var string
     */
    private $format;

    /**
     * @var string
     */
    private $timeZone;

    /**
     * Range constructor.
     * @param string $field
     */
    public function __construct(string $field)
    {
        $this->field = $field;
    }

    /**
     * @inheritdoc
     */
    protected function getType(): string
    {
        return QueryType::RANGE;
    }

    /**
     * @inheritdoc
     */
    protected function getBody(): array
    {
        $dsl = [];
        if (!is_null($this->gte)) {
            $dsl['gte'] = $this->gte;
        }
        if (!is_null($this->lte)) {
            $dsl['lte'] = $this->lte;
        }
        if (!is_null($this->gt)) {
            $dsl['gt'] = $this->gt;
        }
        if (!is_null($this->lt)) {
            $dsl['lt'] = $this->lt;
        }
        if (!is_null($this->boost)) {
            $dsl['boost'] = $this->boost;
        }
        if (!is_null($this->format)) {
            $dsl['format'] = $this->format;
        }
        if (!is_null($this->timeZone)) {
            $dsl['time_zone'] = $this->timeZone;
        }
        return [
            $this->field => $dsl
        ];
    }

    /**
     * @param string|int|float $gte
     * @return Range|static
     */
    public function setGte($gte): Range
    {
        $this->gte = $gte;
        return $this;
    }

    /**
     * @param string|int|float $lte
     * @return Range|static
     */
    public function setLte($lte): Range
    {
        $this->lte = $lte;
        return $this;
    }

    /**
     * @param string|int|float $gt
     * @return Range|static
     */
    public function setGt($gt): Range
    {
        $this->gt = $gt;
        return $this;
    }

    /**
     * @param string|int|float $lt
     * @return Range|static
     */
    public function setLt($lt): Range
    {
        $this->lt = $lt;
        return $this;
    }

    /**
     * @param float $boost
     * @return Range|static
     */
    public function setBoost(float $boost): Range
    {
        $this->boost = $boost;
        return $this;
    }

    /**
     * @param string $format
     * @return Range|static
     */
    public function setFormat(string $format): Range
    {
        $this->format = $format;
        return $this;
    }

    /**
     * @param string $timeZone
     * @return Range|static
     */
    public function setTimeZone(string $timeZone): Range
    {
        $this->timeZone = $timeZone;
        return $this;
    }
}