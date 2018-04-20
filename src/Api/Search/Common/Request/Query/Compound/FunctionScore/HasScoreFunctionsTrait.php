<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\Compound\FunctionScore;

trait HasScoreFunctionsTrait
{
    /**
     * @var ScriptScore
     */
    private $scriptScore;

    /**
     * @var int
     */
    private $weight;

    /**
     * @var RandomScore
     */
    private $randomScore;

    /**
     * @var FieldValueFactor
     */
    private $fieldValueFactor;

    /**
     * @var Decay\Linear
     */
    private $linear;

    /**
     * @var Decay\Exp
     */
    private $exp;

    /**
     * @var Decay\Gauss
     */
    private $gauss;

    /**
     * @return array
     */
    protected function getScoreFunctionsDsl(): array
    {
        $dsl = [];
        if (!is_null($this->scriptScore)) {
            $dsl['script_score'] = $this->scriptScore->toDsl();
        }
        if (!is_null($this->weight)) {
            $dsl['weight'] = $this->weight;
        }
        if (!is_null($this->randomScore)) {
            $dsl['random_score'] = $this->randomScore->toDsl();
        }
        if (!is_null($this->fieldValueFactor)) {
            $dsl['field_value_factor'] = $this->fieldValueFactor->toDsl();
        }
        if (!is_null($this->linear)) {
            $dsl['linear'] = $this->linear->toDsl();
        }
        if (!is_null($this->exp)) {
            $dsl['exp'] = $this->exp->toDsl();
        }
        if (!is_null($this->gauss)) {
            $dsl['gauss'] = $this->gauss->toDsl();
        }
        return $dsl;
    }

    /**
     * @param ScriptScore $scriptScore
     * @return static
     */
    public function setScriptScore(ScriptScore $scriptScore)
    {
        $this->scriptScore = $scriptScore;
        return $this;
    }

    /**
     * @param int $weight
     * @return static
     */
    public function setWeight(int $weight)
    {
        $this->weight = $weight;
        return $this;
    }

    /**
     * @param RandomScore $randomScore
     * @return static
     */
    public function setRandomScore(RandomScore $randomScore)
    {
        $this->randomScore = $randomScore;
        return $this;
    }

    /**
     * @param FieldValueFactor $fieldValueFactor
     * @return static
     */
    public function setFieldValueFactor(FieldValueFactor $fieldValueFactor)
    {
        $this->fieldValueFactor = $fieldValueFactor;
        return $this;
    }

    /**
     * @param Decay\Linear $linear
     * @return static
     */
    public function setLinear(Decay\Linear $linear)
    {
        $this->linear = $linear;
        return $this;
    }

    /**
     * @param Decay\Exp $exp
     * @return static
     */
    public function setExp(Decay\Exp $exp)
    {
        $this->exp = $exp;
        return $this;
    }

    /**
     * @param Decay\Gauss $gauss
     * @return static
     */
    public function setGauss(Decay\Gauss $gauss)
    {
        $this->gauss = $gauss;
        return $this;
    }
}