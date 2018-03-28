<?php

namespace CodeSolo\Elasticsearch\Api\Search\Request\Query;

abstract class AbstractClause
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
            $this->getType() => $this->getBody(),
        ];
    }
}