<?php

namespace MySpot\Elasticsearch\Driver\Api\MultiDoc;

use MySpot\Elasticsearch\Driver\Api\MultiDoc\Bulk\Response;
use MySpot\Elasticsearch\Driver\Api\ToBulkDslInterface;
use MySpot\Elasticsearch\Driver\Connection\Connection;

class Bulk
{
    /**
     * @var Connection
     */
    private $connection;

    /**
     * @var string
     */
    private $index;

    /**
     * @var string
     */
    private $type;

    /**
     * @var array
     */
    private $body = [];

    /**
     * Bulk constructor.
     * @param Connection $connection
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @return Response
     */
    public function do(): Response
    {
        $response = $this->connection->getClient()->bulk(
            $this->toDsl()
        );
        return Response::fromRawData($response);
    }

    /**
     * @return array
     */
    public function toDsl(): array
    {
        $dsl = [
            'body' => $this->body
        ];
        if (!is_null($this->index)) {
            $dsl['index'] = $this->index;
        }
        if (!is_null($this->type)) {
            $dsl['type'] = $this->type;
        }
        return $dsl;
    }

    /**
     * @param ToBulkDslInterface $operation
     * @return Bulk
     */
    public function add(ToBulkDslInterface $operation): Bulk
    {
        $this->body = array_merge(
            $this->body,
            $operation->toBulkDsl()
        );
        return $this;
    }

    /**
     * @param string $index
     * @return static
     */
    public function setIndex(string $index): Bulk
    {
        $this->index = $index;
        return $this;
    }

    /**
     * @param string $type
     * @return static
     */
    public function setType(string $type): Bulk
    {
        $this->type = $type;
        return $this;
    }
}