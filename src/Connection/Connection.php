<?php

namespace MySpot\Elasticsearch\Driver\Connection;

use Elasticsearch\ClientBuilder;
use Elasticsearch\Client;
use MySpot\Elasticsearch\Driver\Api\Search;

class Connection
{
    /**
     * @var Client
     */
    private $client;

    public function __construct()
    {
        $this->client = ClientBuilder::create()->build();
    }

    /**
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }

    /**
     * @return Search
     */
    public function search(): Search
    {
        return new Search($this);
    }
}