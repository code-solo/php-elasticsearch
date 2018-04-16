<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\Terms;

use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\AbstractRequest;
use CodeSolo\Elasticsearch\Api\AggregationsType;

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
        return AggregationsType::BUCKET_TERMS;
    }

    /**
     * @inheritdoc
     */
    protected function getBody(): array
    {
        return [
            'field' => $this->field,
        ];
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