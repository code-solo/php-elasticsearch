<?php

namespace CodeSolo\Elasticsearch\Api\Search\Validate;

use CodeSolo\Elasticsearch\Api\AbstractRequest;
use CodeSolo\Elasticsearch\Api\Search\Common\Request\Query;

class Request extends AbstractRequest
{
    /**
     * @var Query|null
     */
    private $query;

    /**
     * @return array
     */
    public function toDsl(): array
    {
        $dsl = parent::toDsl();
        if ($this->query) {
            $dsl['query'] = $this->query->toDsl();
        }
        return $dsl;
    }

    /**
     * @param Query $query
     * @return static
     */
    public function setQuery(Query $query): Request
    {
        $this->query = $query;
        return $this;
    }
}