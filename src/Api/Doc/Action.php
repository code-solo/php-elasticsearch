<?php

namespace CodeSolo\Elasticsearch\Api\Doc;

use CodeSolo\Elasticsearch\Api\AbstractActionList;
use CodeSolo\Elasticsearch\Exception\ClientNotFound;

class Action extends AbstractActionList
{
    /**
     * @param string|null $client
     * @return Get
     * @throws ClientNotFound
     */
    public function get(string $client = null): Get
    {
        return new Get(
            $this->getClient($client)
        );
    }

    /**
     * @param string|null $client
     * @return Index
     * @throws ClientNotFound
     */
    public function index(string $client = null): Index
    {
        return new Index(
            $this->getClient($client)
        );
    }

    /**
     * @param string|null $client
     * @return Create
     * @throws ClientNotFound
     */
    public function create(string $client = null): Create
    {
        return new Create(
            $this->getClient($client)
        );
    }

    /**
     * @param string|null $client
     * @return Update
     * @throws ClientNotFound
     */
    public function update(string $client = null): Update
    {
        return new Update(
            $this->getClient($client)
        );
    }

    /**
     * @param string|null $client
     * @return Delete
     * @throws ClientNotFound
     */
    public function delete(string $client = null): Delete
    {
        return new Delete(
            $this->getClient($client)
        );
    }
}