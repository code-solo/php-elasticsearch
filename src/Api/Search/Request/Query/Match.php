<?php

namespace CodeSolo\Elasticsearch\Api\Search\Request\Query;

use CodeSolo\Elasticsearch\Api\QueryType;

class Match extends AbstractClause
{
    /**
     * @var string
     */
    private $field;

    /**
     * @var Match\Params|string
     */
    private $params;

    /**
     * Match constructor.
     * @param string $field
     */
    public function __construct(string $field)
    {
        $this->field = $field;
    }

    /**
     * @inheritdoc
     */
    protected function getType(): string
    {
        return QueryType::MATCH;
    }

    /**
     * @inheritdoc
     */
    protected function getBody(): array
    {
        return [
            $this->field => ($this->params instanceof Match\Params) ? $this->params->toDsl() : $this->params
        ];
    }

    /**
     * @param Match\Params|string $params
     * @return Match
     */
    public function setParams($params): Match
    {
        $this->params = $params;
        return $this;
    }
}