<?php

namespace CodeSolo\Elasticsearch\Api\Search\Request\Query;

use CodeSolo\Elasticsearch\Api\Script;

class FunctionScore
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
}