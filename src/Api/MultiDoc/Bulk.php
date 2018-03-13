<?php

namespace CodeSolo\Elasticsearch\Api\MultiDoc;

use CodeSolo\Elasticsearch\Api\MultiDoc\Bulk\Response;
use CodeSolo\Elasticsearch\Api\MultiDoc\Bulk\ToBulkDslInterface;
use CodeSolo\Elasticsearch\Connection\ConnectionInterface;
use CodeSolo\Elasticsearch\Exception\InvalidRawData;

class Bulk
{
    /**
     * @var ConnectionInterface
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
     * @param ConnectionInterface $connection
     */
    public function __construct(ConnectionInterface $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @return Response
     * @throws InvalidRawData
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