<?php

namespace CodeSolo\Elasticsearch\Api;

use CodeSolo\Elasticsearch\ClientInterface;
use CodeSolo\Elasticsearch\ElasticSearch;

abstract class AbstractActionList
{
    /**
     * @param string|null $name
     * @return ClientInterface
     * @throws \CodeSolo\Elasticsearch\Exception\ClientNotFound
     */
    protected function getClient(string $name = null): ClientInterface
    {
        return ElasticSearch::instance()->getClient($name);
    }
}