<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\Term;

use CodeSolo\Elasticsearch\Api\QueryType;
use CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\AbstractClause;

class Term extends AbstractClause
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
     * Term constructor.
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
        return QueryType::TERM;
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
     * @param mixed $value
     * @return Term|static
     */
    public function setValue($value): Term
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @param float $boost
     * @return Term|static
     */
    public function setBoost(float $boost): Term
    {
        $this->boost = $boost;
        return $this;
    }
}