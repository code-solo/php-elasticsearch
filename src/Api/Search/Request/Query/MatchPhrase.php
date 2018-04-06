<?php

namespace CodeSolo\Elasticsearch\Api\Search\Request\Query;

use CodeSolo\Elasticsearch\Api\QueryType;

class MatchPhrase extends AbstractClause
{
    /**
     * @var string
     */
    private $field;

    /**
     * @var MatchPhrase\Params|string
     */
    private $params;

    /**
     * MatchPhrase constructor.
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
        return QueryType::MATCH_PHRASE;
    }

    /**
     * @inheritdoc
     */
    protected function getBody(): array
    {
        return [
            $this->field => ($this->params instanceof MatchPhrase\Params) ? $this->params->toDsl() : $this->params
        ];
    }

    /**
     * @param MatchPhrase\Params|string $params
     * @return MatchPhrase
     */
    public function setParams($params): MatchPhrase
    {
        $this->params = $params;
        return $this;
    }
}