<?php

namespace CodeSolo\Elasticsearch\Api\Search\Request\Query\MatchPhrase;

class Message
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
        $dsl = [];
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
     * @return Message|static
     */
    public function setQuery(string $query): Message
    {
        $this->query = $query;
        return $this;
    }

    /**
     * @param string $analyzer
     * @return Message|static
     */
    public function setAnalyzer(string $analyzer): Message
    {
        $this->analyzer = $analyzer;
        return $this;
    }
}