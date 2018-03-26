<?php

namespace CodeSolo\Elasticsearch\Api\Search\Request\Query;

class MatchPhrase
{
    /**
     * @var MatchPhrase\Message|string
     */
    private $message;

    /**
     * @return array
     */
    public function toDsl(): array
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