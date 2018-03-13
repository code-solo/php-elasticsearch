<?php

namespace MySpot\Elasticsearch\Driver\Connection;

class Manager
{
    /**
     * @var static
     */
    private static $instance;

    /**
     * @var Connection[]
     */
    private $connections = [];

    /**
     * @return static
     */
    public static function getInstance(): Manager
    {
        if (!static::$instance) {
            static::$instance = new static();
            static::$instance->connections[] = new Connection();
        }
        return static::$instance;
    }

    /**
     * @param string|null $name
     * @return Connection
     */
    public function getConnection(string $name = null): Connection
    {
        return $this->connections[0];
    }
}