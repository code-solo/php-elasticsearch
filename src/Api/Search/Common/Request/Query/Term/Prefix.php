<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\Term;

use CodeSolo\Elasticsearch\Api\QueryType;
use CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\AbstractClause;

class Prefix extends AbstractClause
{
    /**
     * @var string
     */
    private $field;

    /**
     * @var string
     */
    private $value;

    /**
     * @var float
     */
    private $boost;

    /**
     * Prefix constructor.
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
        return QueryType::PREFIX;
    }

    /**
     * @inheritdoc
     */
    protected function getBody(): array
    {
        $dsl = [];
        if (!is_null($this->boost)) {
            $dsl['boost'] = $this->boost;
        }
        if ($dsl) {
            $dsl['value'] = $this->value;
        }
        return [
            $this->field => $dsl ? $dsl : $this->value
        ];
    }

    /**
     * @param string $value
     * @return Prefix|static
     */
    public function setValue(string $value): Prefix
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @param string $boost
     * @return Prefix|static
     */
    public function setBoost(string $boost): Prefix
    {
        $this->boost = $boost;
        return $this;
    }
}