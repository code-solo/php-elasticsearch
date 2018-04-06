<?php

namespace CodeSolo\Elasticsearch\Api\Search\Request\Query;

use CodeSolo\Elasticsearch\Api\QueryType;

class FunctionScore extends AbstractClause
{
    /**
     * @var AbstractClause[]
     */
    private $queryClauses = [];

    /**
     * @var string
     */
    private $boost;

    /**
     * @var FunctionScore\Func[]
     */
    private $functions = [];

    /**
     * @var int
     */
    private $maxBoost;

    /**
     * @var string
     */
    private $scoreMode;

    /**
     * @var string
     */
    private $boostMode;

    /**
     * @var int
     */
    private $minScore;

    /**
     * @var FunctionScore\ScriptScore
     */
    private $scriptScore;

    /**
     * @var FunctionScore\RandomScore
     */
    private $randomScore;

    /**
     * @var FunctionScore\FieldValueFactor
     */
    private $fieldValueFactor;

    /**
     * @var FunctionScore\Gauss
     */
    private $gauss;

    /**
     * @inheritdoc
     */
    protected function getType(): string
    {
        return QueryType::FUNCTION_SCORE;
    }

    /**
     * @inheritdoc
     */
    protected function getBody(): array
    {
        $dsl = [];
        if ($this->queryClauses) {
            $dsl['query'] = $this->clausesToDsl($this->queryClauses);
        }
        if (!is_null($this->boost)) {
            $dsl['boost'] = $this->boost;
        }
        if ($this->functions) {
            $dsl['functions'] = array_map(function(FunctionScore\Func $function) {
                return $function->toDsl();
            }, $this->functions);
        }
        if (!is_null($this->maxBoost)) {
            $dsl['max_boost'] = $this->maxBoost;
        }
        if (!is_null($this->scoreMode)) {
            $dsl['score_mode'] = $this->scoreMode;
        }
        if (!is_null($this->boostMode)) {
            $dsl['boost_mode'] = $this->boostMode;
        }
        if (!is_null($this->minScore)) {
            $dsl['min_score'] = $this->minScore;
        }
        if (!is_null($this->scriptScore)) {
            $dsl['script_score'] = $this->scriptScore->toDsl();
        }
        if (!is_null($this->randomScore)) {
            $dsl['random_score'] = $this->randomScore->toDsl();
        }
        if (!is_null($this->fieldValueFactor)) {
            $dsl['field_value_factor'] = $this->fieldValueFactor->toDsl();
        }
        if (!is_null($this->gauss)) {
            $dsl['gauss'] = $this->gauss->toDsl();
        }
        return $dsl;
    }

    /**
     * @param AbstractClause $clause
     * @return FunctionScore|static
     */
    public function addToQuery(AbstractClause $clause): FunctionScore
    {
        $this->queryClauses[] = $clause;
        return $this;
    }

    /**
     * @param string $boost
     * @return FunctionScore|static
     */
    public function setBoost(string $boost): FunctionScore
    {
        $this->boost = $boost;
        return $this;
    }

    /**
     * @param FunctionScore\Func $function
     * @return FunctionScore|static
     */
    public function addToFunctions(FunctionScore\Func $function): FunctionScore
    {
        $this->functions[] = $function;
        return $this;
    }

    /**
     * @param int $maxBoost
     * @return FunctionScore|static
     */
    public function setMaxBoost(int $maxBoost): FunctionScore
    {
        $this->maxBoost = $maxBoost;
        return $this;
    }

    /**
     * @param string $scoreMode
     * @return FunctionScore|static
     */
    public function setScoreMode(string $scoreMode): FunctionScore
    {
        $this->scoreMode = $scoreMode;
        return $this;
    }

    /**
     * @param string $boostMode
     * @return FunctionScore|static
     */
    public function setBoostMode(string $boostMode): FunctionScore
    {
        $this->boostMode = $boostMode;
        return $this;
    }

    /**
     * @param int $minScore
     * @return FunctionScore|static
     */
    public function setMinScore(int $minScore): FunctionScore
    {
        $this->minScore = $minScore;
        return $this;
    }

    /**
     * @param FunctionScore\ScriptScore $scriptScore
     * @return FunctionScore|static
     */
    public function setScriptScore(FunctionScore\ScriptScore $scriptScore): FunctionScore
    {
        $this->scriptScore = $scriptScore;
        return $this;
    }

    /**
     * @param FunctionScore\RandomScore $randomScore
     * @return FunctionScore|static
     */
    public function setRandomScore(FunctionScore\RandomScore $randomScore): FunctionScore
    {
        $this->randomScore = $randomScore;
        return $this;
    }

    /**
     * @param FunctionScore\FieldValueFactor $fieldValueFactor
     * @return FunctionScore|static
     */
    public function setFieldValueFactor(FunctionScore\FieldValueFactor $fieldValueFactor): FunctionScore
    {
        $this->fieldValueFactor = $fieldValueFactor;
        return $this;
    }

    /**
     * @param FunctionScore\Gauss $gauss
     * @return FunctionScore|static
     */
    public function setGauss(FunctionScore\Gauss $gauss): FunctionScore
    {
        $this->gauss = $gauss;
        return $this;
    }

    /**
     * @param AbstractClause[] $clauses
     * @return array
     */
    private function clausesToDsl(array $clauses): array
    {
        if (count($clauses) === 1) {
            return $clauses[0]->toDsl();
        }
        return array_map(function (AbstractClause $clause) {
            return $clause->toDsl();
        }, $clauses);
    }
}