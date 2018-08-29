<?php

namespace CodeSolo\Elasticsearch\Connection;

use CodeSolo\Elasticsearch\SingletonTrait;

class ConnectionPool
{
    use SingletonTrait;

    public function get(): ConnectionInterface
    {

    }
}