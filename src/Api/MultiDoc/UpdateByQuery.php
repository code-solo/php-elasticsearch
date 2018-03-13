<?php

namespace MySpot\Elasticsearch\Driver\Api\MultiDoc;

use MySpot\Elasticsearch\Driver\Api\MultiDoc\UpdateByQuery\Response;
use MySpot\Elasticsearch\Driver\Connection\Connection;

class UpdateByQuery
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
    private $body;

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
        $response = $this->connection->getClient()->updateByQuery(
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
            'index' => $this->index,
            'body' => $this->body,
        ];
        if (!is_null($this->type)) {
            $dsl['type'] = $this->type;
        }
        return $dsl;
    }

    /**
     * @param string $index
     * @return static
     */
    public function setIndex(string $index): UpdateByQuery
    {
        $this->index = $index;
        return $this;
    }

    /**
     * @param string $type
     * @return static
     */
    public function setType(string $type): UpdateByQuery
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @param array $body
     * @return static
     */
    public function setBody(array $body): UpdateByQuery
    {
        $this->body = $body;
        return $this;
    }
}