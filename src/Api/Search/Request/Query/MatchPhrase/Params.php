<?php

namespace CodeSolo\Elasticsearch\Api\Search\Request\Query\MatchPhrase;

use CodeSolo\Elasticsearch\Api\AbstractRequest;

class Params extends AbstractRequest
{
    /**
     * @var string
     */
    private $query;

    /**
     * @var string
     */
    private $analyzer;

    /**
     * @return array
     */
    public function toDsl(): array
    {
        $dsl = parent::toDsl();
        if (!is_null($this->query)) {
            $dsl['query'] = $this->query;
        }
        if (!is_null($this->analyzer)) {
            $dsl['analyzer'] = $this->analyzer;
        }
        return $dsl;
    }

    /**
     * @param string $query
     * @return Params|static
     */
    public function setQuery(string $query): Params
    {
        $this->query = $query;
        return $this;
    }

    /**
     * @param string $analyzer
     * @return Params|static
     */
    public function setAnalyzer(string $analyzer): Params
    {
        $this->analyzer = $analyzer;
        return $this;
    }
}