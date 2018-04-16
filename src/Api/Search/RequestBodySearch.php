<?php

namespace CodeSolo\Elasticsearch\Api\Search;

use CodeSolo\Elasticsearch\Api\AbstractRequest;
use CodeSolo\Elasticsearch\Connection\ConnectionInterface;
use CodeSolo\Elasticsearch\Exception\InvalidRawData;

class RequestBodySearch extends AbstractRequest
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
     * @var RequestBodySearch\Request
     */
    private $body;

    /**
     * RequestBodySearch constructor.
     * @param ConnectionInterface $connection
     */
    public function __construct(ConnectionInterface $connection)
    {
        $this->connection = $connection;
        $this->body = new RequestBodySearch\Request();
    }

    /**
     * @return RequestBodySearch\Response
     * @throws InvalidRawData
     */
    public function do(): RequestBodySearch\Response
    {
        $response = $this->connection->getClient()->search(
            $this->toDsl()
        );
        return RequestBodySearch\Response::fromRawData($response);
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
    public function setIndex(string $index): RequestBodySearch
    {
        $this->index = $index;
        return $this;
    }

    /**
     * @param string $type
     * @return static
     */
    public function setType(string $type): RequestBodySearch
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @param int $from
     * @return static
     */
    public function setFrom(int $from): RequestBodySearch
    {
        $this->body->setFrom($from);
        return $this;
    }

    /**
     * @param int $size
     * @return static
     */
    public function setSize(int $size): RequestBodySearch
    {
        $this->body->setSize($size);
        return $this;
    }

    /**
     * @param RequestBodySearch\Request\Query $query
     * @return static
     */
    public function setQuery(RequestBodySearch\Request\Query $query): RequestBodySearch
    {
        $this->body->setQuery($query);
        return $this;
    }

    /**
     * @param RequestBodySearch\Request\Aggregations $aggregations
     * @return static
     */
    public function setAggregations(RequestBodySearch\Request\Aggregations $aggregations): RequestBodySearch
    {
        $this->body->setAggregations($aggregations);
        return $this;
    }
}