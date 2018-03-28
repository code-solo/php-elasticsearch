<?php

namespace CodeSolo\Elasticsearch\Api\Search\Request\Query;

use CodeSolo\Elasticsearch\Api\QueryType;

class MatchPhrase extends AbstractClause
{
    /**
     * @var MatchPhrase\Message|string
     */
    private $message;

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
        if (!is_null($this->message)) {
            $dsl['message'] = is_string($this->message)
                ? $this->message : $this->message->toDsl();
        }
        return $dsl;
    }

    /**
     * @param MatchPhrase\Message|string $message
     * @return MatchPhrase
     */
    public function setMessage($message): MatchPhrase
    {
        $this->message = $message;
        return $this;
    }
}