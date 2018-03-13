<?php

namespace CodeSolo\Elasticsearch\Api\MultiDoc;

use CodeSolo\Elasticsearch\Connection\ConnectionInterface;

class Reindex
{
    /**
     * @var ConnectionInterface
     */
    private $connection;

    /**
     * @var array
     */
    private $body = [];

    /**
     * Bulk constructor.
     * @param ConnectionInterface $connection
     */
    public function __construct(ConnectionInterface $connection)
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