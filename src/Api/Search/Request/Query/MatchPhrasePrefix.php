<?php

namespace CodeSolo\Elasticsearch\Api\Search\Request\Query;

class MatchPhrasePrefix
{
    /**
     * @var MatchPhrasePrefix\Message|string
     */
    private $message;

    /**
     * @return array
     */
    public function toDsl(): array
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