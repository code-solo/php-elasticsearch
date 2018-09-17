<?php

namespace CodeSolo\Elasticsearch;

use Elasticsearch\ClientBuilder;
use Elasticsearch\Client as LowClient;

class Client implements ClientInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var Client
     */
    private $client;

    /**
     * @inheritdoc
     */
    public function __construct(string $name)
    {
        $this->name = $name;
        $this->client = ClientBuilder
            ::create()
            ->setHosts([
                'http://127.0.0.1:9200'
            ])
            ->build();
    }

    /**
     * @inheritdoc
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @inheritdoc
     */
    public function getLowClient(): LowClient
    {
        return $this->client;
    }
}