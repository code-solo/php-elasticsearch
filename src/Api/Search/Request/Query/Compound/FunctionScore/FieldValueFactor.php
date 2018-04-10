<?php

namespace CodeSolo\Elasticsearch\Api\Search\Request\Query\Compound\FunctionScore;

use CodeSolo\Elasticsearch\Api\AbstractRequest;

class FieldValueFactor extends AbstractRequest
{
    /**
     * @var string
     */
    private $field;

    /**
     * @var float
     */
    private $factor;

    /**
     * @var string
     */
    private $modifier;

    /**
     * @var mixed
     */
    private $missing;

    /**
     * @return array
     */
    public function toDsl(): array
    {
        $dsl = parent::toDsl();
        if (!is_null($this->field)) {
            $dsl['field'] = $this->field;
        }
        if (!is_null($this->factor)) {
            $dsl['factor'] = $this->factor;
        }
        if (!is_null($this->modifier)) {
            $dsl['modifier'] = $this->modifier;
        }
        if (!is_null($this->missing)) {
            $dsl['missing'] = $this->missing;
        }
        return $dsl;
    }

    /**
     * @param string $field
     * @return FieldValueFactor|static
     */
    public function setField(string $field): FieldValueFactor
    {
        $this->field = $field;
        return $this;
    }

    /**
     * @param float $factor
     * @return FieldValueFactor|static
     */
    public function setFactor(float $factor): FieldValueFactor
    {
        $this->factor = $factor;
        return $this;
    }

    /**
     * @param string $modifier
     * @return FieldValueFactor|static
     */
    public function setModifier(string $modifier): FieldValueFactor
    {
        $this->modifier = $modifier;
        return $this;
    }

    /**
     * @param mixed $missing
     * @return FieldValueFactor|static
     */
    public function setMissing($missing): FieldValueFactor
    {
        $this->missing = $missing;
        return $this;
    }
}