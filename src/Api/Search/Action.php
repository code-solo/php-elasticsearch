<?php

namespace CodeSolo\Elasticsearch\Api\Search;

use CodeSolo\Elasticsearch\Api\AbstractActionList;
use CodeSolo\Elasticsearch\Exception\ClientNotFound;

class Action extends AbstractActionList
{
    /**
     * @param string|null $client
     * @return RequestBodySearch
     * @throws ClientNotFound
     */
    public function bodySearch(string $client = null): RequestBodySearch
    {
        return new RequestBodySearch(
            $this->getClient($client)
        );
    }

    /**
     * @param string|null $client
     * @return Count
     * @throws ClientNotFound
     */
    public function count(string $client = null): Count
    {
        return new Count(
            $this->getClient($client)
        );
    }

    /**
     * @param string|null $client
     * @return Validate
     * @throws ClientNotFound
     */
    public function validate(string $client = null): Validate
    {
        return new Validate(
            $this->getClient($client)
        );
    }
}