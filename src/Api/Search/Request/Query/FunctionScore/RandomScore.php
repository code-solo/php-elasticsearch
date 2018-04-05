<?php

namespace CodeSolo\Elasticsearch\Api\Search\Request\Query\FunctionScore;

use CodeSolo\Elasticsearch\Api\AbstractRequest;

class RandomScore extends AbstractRequest
{
    /**
     * @var int
     */
    private $seed;

    /**
     * @var string
     */
    private $field;

    /**
     * @return array
     */
    public function toDsl(): array
    {
        $dsl = parent::toDsl();
        if (!is_null($this->seed)) {
            $dsl['seed'] = $this->seed;
        }
        if (!is_null($this->field)) {
            $dsl['field'] = $this->field;
        }
        return $dsl;
    }

    /**
     * @param int $seed
     * @return RandomScore|static
     */
    public function setSeed(int $seed): RandomScore
    {
        $this->seed = $seed;
        return $this;
    }

    /**
     * @param string $field
     * @return RandomScore|static
     */
    public function setField(string $field): RandomScore
    {
        $this->field = $field;
        return $this;
    }
}