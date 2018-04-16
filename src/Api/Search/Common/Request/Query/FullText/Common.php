<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\FullText;

use CodeSolo\Elasticsearch\Api\QueryType;
use CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\AbstractClause;

class Common extends AbstractClause
{
    /**
     * @var Common\Body
     */
    private $body;

    /**
     * @inheritdoc
     */
    protected function getType(): string
    {
        return QueryType::COMMON;
    }

    /**
     * @inheritdoc
     */
    protected function getBody(): array
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