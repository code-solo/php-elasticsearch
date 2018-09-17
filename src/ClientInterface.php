<?php

namespace CodeSolo\Elasticsearch;

use Elasticsearch\Client;

interface ClientInterface
{
    /**
     * @param string $name
     */
    public function __construct(string $name);

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return Client
     */
    public function getLowClient(): Client;
}