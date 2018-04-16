<?php

namespace CodeSolo\Elasticsearch\Connection;

use Elasticsearch\ClientBuilder;
use Elasticsearch\Client;

class Connection implements ConnectionInterface
{
    /**
     * @var Client
     */
    private $client;

    public function __construct()
    {
        $this->client = ClientBuilder
            ::create()
            ->setHosts([
                'http://127.0.0.1:9200'
            ])
            ->build();
    }

    /**
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }
}