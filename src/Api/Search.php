<?php

namespace CodeSolo\Elasticsearch\Api;

use CodeSolo\Elasticsearch\Api\Search\Request;
use CodeSolo\Elasticsearch\Api\Search\Response;
use CodeSolo\Elasticsearch\Connection\ConnectionInterface;
use CodeSolo\Elasticsearch\Exception\InvalidRawData;

class Search
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
     * @var Request
     */
    private $body;

    /**
     * Search constructor.
     * @param ConnectionInterface $connection
     */
    public function __construct(ConnectionInterface $connection)
    {
        $this->connection = $connection;
        $this->body = new Request();
    }

    /**
     * @return Response
     * @throws InvalidRawData
     */
    public function do(): Response
    {
        $response = $this->connection->getClient()->search(
            $this->toDsl()
        );
        return Response::fromRawData($response);
    }

    /**
     * @return array
     */
    public function toDsl(): array
    {
        $dsl = [];
        if (!is_null($this->index)) {
            $dsl['index'] = $this->index;
        }
        if (!is_null($this->type)) {
            $dsl['type'] = $this->type;
        }
        $dsl['body'] = $this->body->toDsl();
        return $dsl;
    }

    /**
     * @param string $index
     * @return static
     */
    public function setIndex(string $index): Search
    {
        $this->index = $index;
        return $this;
    }

    /**
     * @param string $type
     * @return static
     */
    public function setType(string $type): Search
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @param int $from
     * @return static
     */
    public function setFrom(int $from): Search
    {
        $this->body->setFrom($from);
        return $this;
    }

    /**
     * @param int $size
     * @return static
     */
    public function setSize(int $size): Search
    {
        $this->body->setSize($size);
        return $this;
    }

    /**
     * @param Request\Query $query
     * @return static
     */
    public function setQuery(Request\Query $query): Search
    {
        $this->body->setQuery($query);
        return $this;
    }

    /**
     * @param Request\Aggregations $aggregations
     * @return static
     */
    public function setAggregations(Request\Aggregations $aggregations): Search
    {
        $this->body->setAggregations($aggregations);
        return $this;
    }
}