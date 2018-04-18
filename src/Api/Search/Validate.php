<?php

namespace CodeSolo\Elasticsearch\Api\Search;

use CodeSolo\Elasticsearch\Api\AbstractRequest;
use CodeSolo\Elasticsearch\Api\Search\Common\Request\Query;
use CodeSolo\Elasticsearch\Connection\ConnectionInterface;
use CodeSolo\Elasticsearch\Exception\InvalidRawData;

class Validate extends AbstractRequest
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
     * @var Count\Request
     */
    private $body;

    /**
     * RequestBodySearch constructor.
     * @param ConnectionInterface $connection
     */
    public function __construct(ConnectionInterface $connection)
    {
        $this->connection = $connection;
        $this->body = new Validate\Request();
    }

    /**
     * @return Validate\Response
     * @throws InvalidRawData
     */
    public function do(): Validate\Response
    {
        $response = $this->connection->getClient()->count(
            $this->toDsl()
        );
        return Validate\Response::fromRawData($response);
    }

    /**
     * @param string $index
     * @return static
     */
    public function setIndex(string $index): Validate
    {
        $this->index = $index;
        return $this;
    }

    /**
     * @param string $type
     * @return static
     */
    public function setType(string $type): Validate
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @param Query $query
     * @return static
     */
    public function setQuery(Query $query): Validate
    {
        $this->body->setQuery($query);
        return $this;
    }
}