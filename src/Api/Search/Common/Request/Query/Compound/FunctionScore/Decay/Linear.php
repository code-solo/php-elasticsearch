<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\Compound\FunctionScore\Decay;

class Linear extends AbstractDecay
{
    /**
     * @inheritdoc
     */
    protected function getType(): string
    {
        return DecayType::LINEAR;
    }
}