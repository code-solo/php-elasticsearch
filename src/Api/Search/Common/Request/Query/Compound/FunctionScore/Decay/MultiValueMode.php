<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\Compound\FunctionScore\Decay;

final class MultiValueMode
{
    const MIN = 'min';
    const MAX = 'max';
    const AVG = 'avg';
    const SUM = 'sum';
}