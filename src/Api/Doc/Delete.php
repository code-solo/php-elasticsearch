<?php

namespace MySpot\Elasticsearch\Driver\Api\Doc;

use MySpot\Elasticsearch\Driver\Api\Doc\Delete\Response;
use MySpot\Elasticsearch\Driver\Api\ToBulkDslInterface;
use MySpot\Elasticsearch\Driver\Connection\Connection;

class Delete implements ToBulkDslInterface
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
        $response = $this->connection->getClient()->delete(
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
     * @return array
     */
    public function toBulkDsl(): array
    {
        $dsl = $this->toDsl();
        $metaData = [];
        foreach ($dsl as $key => $value) {
            switch ($key) {
                case 'index':
                case 'type':
                case 'id':
                    $metaData['_' . $key] = $value;
                    break;
                    break;
                case 'client':
                    break;
                default:
                    $metaData[$key] = $value;
            }
        }
        return [
            [
                'delete' => $metaData
            ]
        ];
    }

    /**
     * @param string $index
     * @return static
     */
    public function setIndex(string $index): Delete
    {
        $this->index = $index;
        return $this;
    }

    /**
     * @param string $type
     * @return static
     */
    public function setType(string $type): Delete
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @param string $id
     * @return static
     */
    public function setId(string $id): Delete
    {
        $this->id = $id;
        return $this;
    }
}