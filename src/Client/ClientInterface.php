<?php

namespace CodeSolo\Elasticsearch\Client;

use Elasticsearch\Client;

interface ClientInterface
{
    public function getName(): string;

    public function getLowClient(): Client;
}