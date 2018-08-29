<?php

namespace CodeSolo\Elasticsearch\Client;

use Elasticsearch\ClientBuilder;
use Elasticsearch\Client as LowClient;

class Client implements ClientInterface
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
     * @return LowClient
     */
    public function getLowClient(): LowClient
    {
        return $this->client;
    }
}