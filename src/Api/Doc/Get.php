<?php

namespace MySpot\Elasticsearch\Driver\Api\Doc;

use MySpot\Elasticsearch\Driver\Api\Doc\Get\Response;
use MySpot\Elasticsearch\Driver\Connection\Connection;

class Get
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
     * @var string
     */
    private $id;

    /**
     * Index constructor.
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