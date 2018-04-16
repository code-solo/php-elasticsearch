<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Request\Query;

use CodeSolo\Elasticsearch\Api\AbstractRequest;

abstract class AbstractClause extends AbstractRequest
{
    /**
     * @return string
     */
    abstract protected function getType(): string;

    /**
     * @return array
     */
    abstract protected function getBody(): array;

    /**
     * @return array
     */
    public function toDsl(): array
    {
        return [
            $this->getType() => array_merge(parent::toDsl(), $this->getBody()),
        ];
    }
}