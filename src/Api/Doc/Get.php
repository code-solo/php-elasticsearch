<?php

namespace CodeSolo\Elasticsearch\Api\Doc;

use CodeSolo\Elasticsearch\Api\Doc\Get\Response;
use CodeSolo\Elasticsearch\Connection\ConnectionInterface;
use CodeSolo\Elasticsearch\Exception\InvalidRawData;

class Get
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
     * @var string
     */
    private $id;

    /**
     * Index constructor.
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
        $response = $this->connection->getClient()->get(
            $this->toDsl()
        );
        return Response::fromRawData($response);
    }

    /**
     * @return array
     */
    public function toDsl(): array
    {
        return [
            'index' => $this->index,
            'type' => $this->type,
            'id' => $this->id,
            'client' => [
                'ignore' => 404
            ],
        ];
    }

    /**
     * @param string $index
     * @return static
     */
    public function setIndex(string $index): Get
    {
        $this->index = $index;
        return $this;
    }

    /**
     * @param string $type
     * @return static
     */
    public function setType(string $type): Get
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @param string $id
     * @return static
     */
    public function setId(string $id): Get
    {
        $this->id = $id;
        return $this;
    }
}