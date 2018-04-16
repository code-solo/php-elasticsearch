<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\Term;

use CodeSolo\Elasticsearch\Api\QueryType;
use CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\AbstractClause;

class Fuzzy extends AbstractClause
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
     * @var int
     */
    private $fuzziness;

    /**
     * @var int
     */
    private $prefixLength;

    /**
     * @var int
     */
    private $maxExpansions;

    /**
     * @var bool
     */
    private $transpositions;

    /**
     * Fuzzy constructor.
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
        return QueryType::FUZZY;
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
        if (!is_null($this->fuzziness)) {
            $dsl['fuzziness'] = $this->fuzziness;
        }
        if (!is_null($this->prefixLength)) {
            $dsl['prefix_length'] = $this->prefixLength;
        }
        if (!is_null($this->maxExpansions)) {
            $dsl['max_expansions'] = $this->maxExpansions;
        }
        if (!is_null($this->transpositions)) {
            $dsl['transpositions'] = $this->transpositions;
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
     * @return Fuzzy|static
     */
    public function setValue(string $value): Fuzzy
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @param string $boost
     * @return Fuzzy|static
     */
    public function setBoost(string $boost): Fuzzy
    {
        $this->boost = $boost;
        return $this;
    }

    /**
     * @param int $fuzziness
     * @return Fuzzy|static
     */
    public function setFuzziness(int $fuzziness): Fuzzy
    {
        $this->fuzziness = $fuzziness;
        return $this;
    }

    /**
     * @param int $prefixLength
     * @return Fuzzy|static
     */
    public function setPrefixLength(int $prefixLength): Fuzzy
    {
        $this->prefixLength = $prefixLength;
        return $this;
    }

    /**
     * @param int $maxExpansions
     * @return Fuzzy|static
     */
    public function setMaxExpansions(int $maxExpansions): Fuzzy
    {
        $this->maxExpansions = $maxExpansions;
        return $this;
    }

    /**
     * @param bool $transpositions
     * @return Fuzzy|static
     */
    public function setTranspositions(bool $transpositions): Fuzzy
    {
        $this->transpositions = $transpositions;
        return $this;
    }
}