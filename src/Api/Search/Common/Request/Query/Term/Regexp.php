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
     * @var string
     */
    private $flags;

    /**
     * @var int
     */
    private $maxDeterminizedStates;

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
        return QueryType::REGEXP;
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
        if (!is_null($this->flags)) {
            $dsl['flags'] = $this->flags;
        }
        if (!is_null($this->maxDeterminizedStates)) {
            $dsl['max_determinized_states'] = $this->maxDeterminizedStates;
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
     * @param float $boost
     * @return Regexp|static
     */
    public function setBoost(float $boost): Regexp
    {
        $this->boost = $boost;
        return $this;
    }

    /**
     * @param string $flags
     * @return Regexp|static
     */
    public function setFlags(string $flags): Regexp
    {
        $this->flags = $flags;
        return $this;
    }

    /**
     * @param int $maxDeterminizedStates
     * @return Regexp|static
     */
    public function setMaxDeterminizedStates(int $maxDeterminizedStates): Regexp
    {
        $this->maxDeterminizedStates = $maxDeterminizedStates;
        return $this;
    }
}