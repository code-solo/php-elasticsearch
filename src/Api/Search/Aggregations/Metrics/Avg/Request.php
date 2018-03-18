<?php

namespace CodeSolo\Elasticsearch\Api\Search\Aggregations\Metrics\Avg;

use CodeSolo\Elasticsearch\Api\Search\Aggregations\AbstractRequest;
use CodeSolo\Elasticsearch\Api\Search\Aggregations\Type;

class Request extends AbstractRequest
{
    /**
     * @var string
     */
    private $field;

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
        return Type::METRICS_AVG;
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