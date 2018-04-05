<?php

namespace CodeSolo\Elasticsearch\Api\Search\Request\Query\FunctionScore\FieldValueFactor;

final class Modifier
{
    const NONE = 'none';
    const LOG = 'log';
    const LOG1P = 'log1p';
    const LOG2P = 'log2p';
    const LN = 'ln';
    const LN1P = 'ln1p';
    const LN2P = 'ln2p';
    const SQUARE = 'square';
    const SQRT = 'sqrt';
    const RECIPROCAL = 'reciprocal';
}