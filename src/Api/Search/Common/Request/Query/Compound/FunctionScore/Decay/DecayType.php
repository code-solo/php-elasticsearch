<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\Compound\FunctionScore\Decay;

final class DecayType
{
    const LINEAR = 'linear';
    const EXP = 'exp';
    const GAUSS = 'gauss';
}