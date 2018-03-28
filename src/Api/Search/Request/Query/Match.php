<?php

namespace CodeSolo\Elasticsearch\Api\Search\Request\Query;

use CodeSolo\Elasticsearch\Api\QueryType;

class Match extends AbstractClause
{
    /**
     * @var Match\Message|string
     */
    private $message;

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
        $dsl = [];
        if (!is_null($this->message)) {
            $dsl['message'] = is_string($this->message)
                ? $this->message : $this->message->toDsl();
        }
        return $dsl;
    }

    /**
     * @param Match\Message|string $message
     * @return Match
     */
    public function setMessage($message): Match
    {
        $this->message = $message;
        return $this;
    }
}