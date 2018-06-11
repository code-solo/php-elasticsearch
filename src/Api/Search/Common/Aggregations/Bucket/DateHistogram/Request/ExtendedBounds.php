<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\DateHistogram\Request;

use CodeSolo\Elasticsearch\Api\AbstractRequest;

class ExtendedBounds extends AbstractRequest
{
    /**
     * @var int
     */
    private $min;

    /**
     * @var int
     */
    private $max;

    /**
     * @inheritdoc
     */
    public function toDsl(): array
    {
        $dsl = parent::toDsl();
        if (!is_null($this->min)) {
            $dsl['min'] = $this->min;
        }
        if (!is_null($this->max)) {
            $dsl['max'] = $this->max;
        }
        return $dsl;
    }

    /**
     * @param int $min
     * @return static
     */
    public function setMin(int $min): ExtendedBounds
    {
        $this->min = $min;
        return $this;
    }

    /**
     * @param int $max
     * @return static
     */
    public function setMax(int $max): ExtendedBounds
    {
        $this->max = $max;
        return $this;
    }
}