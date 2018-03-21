<?php

namespace CodeSolo\Elasticsearch\Api\Search\Aggregations\Metrics\GeoCentroid;

use CodeSolo\Elasticsearch\Api\Search\Aggregations\AbstractRequest;
use CodeSolo\Elasticsearch\Api\Search\Aggregations\Type;

class Request extends AbstractRequest
{
    /**
     * @var string
     */
    private $field;

    /**
     * @inheritdoc
     */
    public function getType(): string
    {
        return Type::METRICS_GEO_CENTROID;
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
}