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
     * @var Decay\AbstractDecay[]
     */
    private $decayFunctions = [];

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
        foreach ($this->decayFunctions as $item) {
            $dsl = array_merge($dsl, $item->toDsl());
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
     * @param Decay\AbstractDecay $decay
     * @return static
     */
    public function addDecayFunction(Decay\AbstractDecay $decay)
    {
        $this->decayFunctions[] = $decay;
        return $this;
    }
}