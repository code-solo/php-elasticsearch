<?php

namespace MySpot\Elasticsearch\Driver\Api\Doc;

use MySpot\Elasticsearch\Driver\Api\Doc\Index\Response;
use MySpot\Elasticsearch\Driver\Api\ToBulkDslInterface;
use MySpot\Elasticsearch\Driver\Connection\Connection;

class Index implements ToBulkDslInterface
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
        $response = $this->connection->getClient()->index(
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
            'type' => $this->type,
            'body' => $this->body ?? (object) [],
        ];
        if (!is_null($this->id)) {
            $dsl['id'] = $this->id;
        }
        return $dsl;
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
                'index' => $metaData
            ],
            $source ?? (object) []
        ];
    }

    /**
     * @param string $index
     * @return static
     */
    public function setIndex(string $index): Index
    {
        $this->index = $index;
        return $this;
    }

    /**
     * @param string $type
     * @return static
     */
    public function setType(string $type): Index
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @param string $id
     * @return static
     */
    public function setId(string $id): Index
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param array $body
     * @return static
     */
    public function setBody(array $body): Index
    {
        $this->body = $body;
        return $this;
    }
}