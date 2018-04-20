<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\Compound;

use CodeSolo\Elasticsearch\Api\QueryType;
use CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\AbstractClause;
use CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\Compound\FunctionScore\HasScoreFunctionsTrait;

class FunctionScore extends AbstractClause
{
    use HasScoreFunctionsTrait;

    /**
     * @var AbstractClause[]
     */
    private $queryClauses = [];

    /**
     * @var float
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
        $dsl = $this->getScoreFunctionsDsl();
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
     * @param float $boost
     * @return FunctionScore|static
     */
    public function setBoost(float $boost): FunctionScore
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