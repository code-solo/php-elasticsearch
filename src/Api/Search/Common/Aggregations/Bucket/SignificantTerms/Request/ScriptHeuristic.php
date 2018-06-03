<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\SignificantTerms\Request;

use CodeSolo\Elasticsearch\Api\AbstractRequest;
use CodeSolo\Elasticsearch\Api\Script;

class ScriptHeuristic extends AbstractRequest
{
    /**
     * @var Script
     */
    private $script;

    /**
     * @inheritdoc
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
     * @return static
     */
    public function setScript(Script $script): ScriptHeuristic
    {
        $this->script = $script;
        return $this;
    }
}