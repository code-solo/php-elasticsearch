<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Matrix\MatrixStats;

use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\AbstractRequest;
use CodeSolo\Elasticsearch\Api\AggregationsType;

class Request extends AbstractRequest
{
    /**
     * @var string[]
     */
    private $fields;

    /**
     * @var mixed[]
     */
    private $missing;

    /**
     * @inheritdoc
     */
    public function getType(): string
    {
        return AggregationsType::MATRIX_STATS;
    }

    /**
     * @inheritdoc
     */
    protected function getBody(): array
    {
        $dsl = [];
        if (!is_null($this->fields)) {
            $dsl['fields'] = $this->fields;
        }
        if (!is_null($this->missing)) {
            $dsl['missing'] = $this->missing;
        }
        return $dsl;
    }

    /**
     * @param string[] $fields
     * @return Request|static
     */
    public function setFields(array $fields): Request
    {
        $this->fields = $fields;
        return $this;
    }

    /**
     * @param mixed[] $missing
     * @return Request|static
     */
    public function setMissing(array $missing): Request
    {
        $this->missing = $missing;
        return $this;
    }
}