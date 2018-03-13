<?php

namespace MySpot\Elasticsearch\Driver\Api;

use MySpot\Elasticsearch\Driver\Api\Search\Query;
use MySpot\Elasticsearch\Driver\Api\Search\Response;
use MySpot\Elasticsearch\Driver\Connection\Connection;

class Search
{
    /**
     * @var Connection
     */
    private $connection;

    /**
     * @var Query
     */
    private $query;

    /**
     * Search constructor.
     * @param Connection $connection
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @return Response
     */
    public function do(): Response
    {

    }
}