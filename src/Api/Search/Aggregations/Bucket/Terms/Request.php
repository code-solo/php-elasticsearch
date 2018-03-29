<?php

namespace CodeSolo\Elasticsearch\Api\Search\Aggregations\Bucket\Terms;

use CodeSolo\Elasticsearch\Api\Search\Aggregations\Bucket\AbstractRequest;
use CodeSolo\Elasticsearch\Api\AggregationsType;

class Request extends AbstractRequest
{
    /**
     * @var string
     */
    private $field;

    /**
     * @inheritdoc
     * @param string $field
     */
    public function __construct(string $name, string $field)
    {
        parent::__construct($name);
        $this->field = $field;
    }

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
}