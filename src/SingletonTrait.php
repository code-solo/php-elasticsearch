<?php

namespace CodeSolo\Elasticsearch;

trait SingletonTrait
{
    /**
     * @var static
     */
    protected static $instance;

    /**
     * @return static
     */
    public static function getInstance(): self
    {
        if (!static::$instance) {
            static::$instance = new static();
        }
        return static::$instance;
    }

    protected function __construct()
    {
    }
}