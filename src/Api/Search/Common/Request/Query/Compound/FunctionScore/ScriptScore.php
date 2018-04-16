<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\Compound\FunctionScore;

use CodeSolo\Elasticsearch\Api\AbstractRequest;
use CodeSolo\Elasticsearch\Api\Script;

class ScriptScore extends AbstractRequest
{
    /**
     * @var Script
     */
    private $script;

    /**
     * @return array
     */
    public function toDsl(): array
    {
        $dsl = parent::toDsl();
        if (!is_null($this->script)) {
            $dsl['script'] = $this->script->toDsl();
        }
        return $dsl;
    }

    /**
     * @param Script $script
     * @return ScriptScore|static
     */
    public function setScript(Script $script): ScriptScore
    {
        $this->script = $script;
        return $this;
    }
}