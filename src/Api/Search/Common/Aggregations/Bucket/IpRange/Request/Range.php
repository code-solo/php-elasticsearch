<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\IpRange\Request;

use CodeSolo\Elasticsearch\Api\AbstractRequest;

class Range extends AbstractRequest
{
    /**
     * @var string
     */
    private $key;

    /**
     * @var string
     */
    private $from;

    /**
     * @var string
     */
    private $to;

    /**
     * @var string
     */
    private $mask;

    /**
     * @inheritdoc
     */
    public function toDsl(): array
    {
        $dsl = parent::toDsl();
        if (!is_null($this->key)) {
            $dsl['key'] = $this->key;
        }
        if (!is_null($this->from)) {
            $dsl['from'] = $this->from;
        }
        if (!is_null($this->to)) {
            $dsl['to'] = $this->to;
        }
        if (!is_null($this->mask)) {
            $dsl['mask'] = $this->mask;
        }
        return $dsl;
    }

    /**
     * @param string $key
     * @return Range
     */
    public function setKey(string $key): Range
    {
        $this->key = $key;
        return $this;
    }

    /**
     * @param string $to
     * @return Range
     */
    public function setTo(string $to): Range
    {
        $this->to = $to;
        return $this;
    }

    /**
     * @param string $from
     * @return Range
     */
    public function setFrom(string $from): Range
    {
        $this->from = $from;
        return $this;
    }

    /**
     * @param string $mask
     * @return Range
     */
    public function setMask(string $mask): Range
    {
        $this->mask = $mask;
        return $this;
    }
}