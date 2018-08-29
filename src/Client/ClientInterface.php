<?php

namespace CodeSolo\Elasticsearch\Connection;

use Elasticsearch\Client;

interface ConnectionInterface
{
    public function getClient(): Client;
}