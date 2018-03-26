<?php

namespace CodeSolo\Elasticsearch\Api\Search\Request\Query;

class Common
{
    /**
     * @var Common\Body
     */
    private $body;

    /**
     * @return array
     */
    public function toDsl(): array
    {
        $dsl = [];
        if (!is_null($this->body)) {
            $dsl['body'] = $this->body->toDsl();
        }
        return $dsl;
    }

    /**
     * @param Common\Body $body
     * @return Common|static
     */
    public function setBody(Common\Body $body): Common
    {
        $this->body = $body;
        return $this;
    }
}