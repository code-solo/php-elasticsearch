<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\Term;

use CodeSolo\Elasticsearch\Api\QueryType;
use CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\AbstractClause;

class Regexp extends AbstractClause
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
     * Regexp constructor.
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
        return QueryType::WILDCARD;
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
     * @return Regexp|static
     */
    public function setValue(string $value): Regexp
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @param string $boost
     * @return Regexp|static
     */
    public function setBoost(string $boost): Regexp
    {
        $this->boost = $boost;
        return $this;
    }
}