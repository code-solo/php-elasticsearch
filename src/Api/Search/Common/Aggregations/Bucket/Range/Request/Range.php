<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\Range\Request;

use CodeSolo\Elasticsearch\Api\AbstractRequest;

class Range extends AbstractRequest
{
    /**
     * @var string
     */
    private $key;

    /**
     * @var mixed
     */
    private $from;

    /**
     * @var mixed
     */
    private $to;

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
     * @param mixed $to
     * @return Range
     */
    public function setTo($to): Range
    {
        $this->to = $to;
        return $this;
    }

    /**
     * @param mixed $from
     * @return Range
     */
    public function setFrom($from): Range
    {
        $this->from = $from;
        return $this;
    }
}