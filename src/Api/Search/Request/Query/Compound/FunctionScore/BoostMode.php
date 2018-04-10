<?php

namespace CodeSolo\Elasticsearch\Api\Search\Request\Query\Compound\FunctionScore;

final class BoostMode
{
    const MULTIPLY = 'multiply';
    const REPLACE = 'replace';
    const SUM = 'sum';
    const AVG = 'avg';
    const MAX = 'max';
    const MIN = 'min';
}