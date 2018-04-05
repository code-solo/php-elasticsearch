<?php

namespace CodeSolo\Elasticsearch\Api\Search\Request\Query\FunctionScore;

final class ScoreMode
{
    const MULTIPLY = 'multiply';
    const SUM = 'sum';
    const AVG = 'avg';
    const FIRST = 'first';
    const MAX = 'max';
    const MIN = 'min';
}