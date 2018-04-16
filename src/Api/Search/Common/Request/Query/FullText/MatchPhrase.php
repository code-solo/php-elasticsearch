<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\FullText;

use CodeSolo\Elasticsearch\Api\QueryType;
use CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\AbstractClause;

class MatchPhrase extends AbstractClause
{
    /**
     * @var string
     */
    private $field;

    /**
     * @var string
     */
    private $query;

    /**
     * @var string
     */
    private $analyzer;

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
        $dsl = [];
        if (!is_null($this->analyzer)) {
            $dsl['analyzer'] = $this->analyzer;
        }
        if ($dsl) {
            $dsl['query'] = $this->query;
        }
        return [
            $this->field => $dsl ? $dsl : $this->query
        ];
    }

    /**
     * @param string $query
     * @return MatchPhrase|static
     */
    public function setQuery(string $query): MatchPhrase
    {
        $this->query = $query;
        return $this;
    }

    /**
     * @param string $analyzer
     * @return MatchPhrase|static
     */
    public function setAnalyzer(string $analyzer): MatchPhrase
    {
        $this->analyzer = $analyzer;
        return $this;
    }
}