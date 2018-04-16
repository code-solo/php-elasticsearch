<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\Term;

use CodeSolo\Elasticsearch\Api\QueryType;
use CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\AbstractClause;

class Type extends AbstractClause
{
    /**
     * @var string
     */
    private $value;

    /**
     * Type constructor.
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->value = $value;
    }

    /**
     * @inheritdoc
     */
    protected function getType(): string
    {
        return QueryType::TYPE;
    }

    /**
     * @inheritdoc
     */
    protected function getBody(): array
    {
        return [
            'value' => $this->value
        ];
    }
}