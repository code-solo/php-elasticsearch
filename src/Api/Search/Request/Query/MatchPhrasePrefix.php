<?php

namespace CodeSolo\Elasticsearch\Api\Search\Request\Query;

use CodeSolo\Elasticsearch\Api\AbstractRequest;
use CodeSolo\Elasticsearch\Api\QueryType;

class MatchPhrasePrefix extends AbstractClause
{
    /**
     * @var string
     */
    private $field;

    /**
     * @var MatchPhrasePrefix\Params|string
     */
    private $params;

    /**
     * MatchPhrasePrefix constructor.
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
        return QueryType::MATCH_PHRASE_PREFIX;
    }

    /**
     * @inheritdoc
     */
    protected function getBody(): array
    {
        return [
            $this->field => ($this->params instanceof MatchPhrasePrefix\Params) ? $this->params->toDsl() : $this->params
        ];
    }

    /**
     * @param MatchPhrasePrefix\Params|string $params
     * @return MatchPhrasePrefix
     */
    public function setParams($params): MatchPhrasePrefix
    {
        $this->params = $params;
        return $this;
    }
}