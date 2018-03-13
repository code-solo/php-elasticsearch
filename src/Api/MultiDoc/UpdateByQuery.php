<?php

namespace CodeSolo\Elasticsearch\Api\MultiDoc;

use CodeSolo\Elasticsearch\Api\MultiDoc\UpdateByQuery\Response;
use CodeSolo\Elasticsearch\Connection\ConnectionInterface;
use CodeSolo\Elasticsearch\Exception\InvalidRawData;

class UpdateByQuery
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
    private $body;

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