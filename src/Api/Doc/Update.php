<?php

namespace CodeSolo\Elasticsearch\Api\Doc;

use CodeSolo\Elasticsearch\Api\Doc\Update\Response;
use CodeSolo\Elasticsearch\Api\MultiDoc\Bulk\ToBulkDslInterface;
use CodeSolo\Elasticsearch\Connection\ConnectionInterface;
use CodeSolo\Elasticsearch\Exception\InvalidRawData;

class Update implements ToBulkDslInterface
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
        $response = $this->connection->getClient()->update(
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
            'body' => $this->body,
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
                case 'body':
                    $source = $value;
                    break;
                default:
                    $metaData[$key] = $value;
            }
        }
        return [
            [
                'update' => $metaData
            ],
            $source ?? []
        ];
    }

    /**
     * @param string $index
     * @return static
     */
    public function setIndex(string $index): Update
    {
        $this->index = $index;
        return $this;
    }

    /**
     * @param string $type
     * @return static
     */
    public function setType(string $type): Update
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @param string $id
     * @return static
     */
    public function setId(string $id): Update
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param array $body
     * @return static
     */
    public function setBody(array $body): Update
    {
        $this->body = $body;
        return $this;
    }
}