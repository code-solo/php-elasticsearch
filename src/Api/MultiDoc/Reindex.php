<?php

namespace MySpot\Elasticsearch\Driver\Api\MultiDoc;

use MySpot\Elasticsearch\Driver\Connection\Connection;

class Reindex
{
    /**
     * @var Connection
     */
    private $connection;

    /**
     * @var array
     */
    private $body = [];

    /**
     * Bulk constructor.
     * @param Connection $connection
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @param array $body
     * @return static
     */
    public function setBody(array $body): Reindex
    {
        $this->body = $body;
        return $this;
    }
}