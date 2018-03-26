<?php

namespace CodeSolo\Elasticsearch\Api\Search\Request\Query;

class Match
{
    /**
     * @var Match\Message|string
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
     * @param Match\Message|string $message
     * @return Match
     */
    public function setMessage($message): Match
    {
        $this->message = $message;
        return $this;
    }
}