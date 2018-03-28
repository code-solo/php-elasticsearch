<?php

namespace CodeSolo\Elasticsearch\Api\Search\Request\Query;

use CodeSolo\Elasticsearch\Api\QueryType;

class MatchPhrasePrefix extends AbstractClause
{
    /**
     * @var MatchPhrasePrefix\Message|string
     */
    private $message;

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
        $dsl = [];
        if (!is_null($this->message)) {
            $dsl['message'] = is_object($this->message)
                ? $this->message->toDsl() : $this->message;
        }
        return $dsl;
    }

    /**
     * @param MatchPhrasePrefix\Message|string $message
     * @return MatchPhrasePrefix
     */
    public function setMessage($message): MatchPhrasePrefix
    {
        $this->message = $message;
        return $this;
    }
}