<?php

namespace CodeSolo\Elasticsearch\Api\MultiDoc;

use CodeSolo\Elasticsearch\Api\AbstractActionList;
use CodeSolo\Elasticsearch\Exception\ClientNotFound;

class Action extends AbstractActionList
{
    /**
     * @param string|null $client
     * @return Bulk
     * @throws ClientNotFound
     */
    public function bulk(string $client = null): Bulk
    {
        return new Bulk(
            $this->getClient($client)
        );
    }

    /**
     * @param string|null $client
     * @return MGet
     * @throws ClientNotFound
     */
    public function mGet(string $client = null): MGet
    {
        return new MGet(
            $this->getClient($client)
        );
    }

    /**
     * @param string|null $client
     * @return Reindex
     * @throws ClientNotFound
     */
    public function reindex(string $client = null): Reindex
    {
        return new Reindex(
            $this->getClient($client)
        );
    }

    /**
     * @param string|null $client
     * @return UpdateByQuery
     * @throws ClientNotFound
     */
    public function updateByQuery(string $client = null): UpdateByQuery
    {
        return new UpdateByQuery(
            $this->getClient($client)
        );
    }

    /**
     * @param string|null $client
     * @return DeleteByQuery
     * @throws ClientNotFound
     */
    public function deleteByQuery(string $client = null): DeleteByQuery
    {
        return new DeleteByQuery(
            $this->getClient($client)
        );
    }
}