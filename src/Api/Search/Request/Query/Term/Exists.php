<?php

namespace CodeSolo\Elasticsearch\Api\Search\Request\Query\Term;

use CodeSolo\Elasticsearch\Api\QueryType;
use CodeSolo\Elasticsearch\Api\Search\Request\Query\AbstractClause;

class Exists extends AbstractClause
{
    /**
     * @var string
     */
    private $field;

    /**
     * Exists constructor.
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
        return QueryType::EXISTS;
    }

    /**
     * @inheritdoc
     */
    protected function getBody(): array
    {
        return [
            'field' => $this->field
        ];
    }
}