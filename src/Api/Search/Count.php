<?php

namespace CodeSolo\Elasticsearch\Api\Search;

use CodeSolo\Elasticsearch\Api\AbstractRequest;
use CodeSolo\Elasticsearch\Connection\ConnectionInterface;
use CodeSolo\Elasticsearch\Exception\InvalidRawData;

class Count extends AbstractRequest
{
    /**
     * @var ConnectionInterface
     */
    private $connection;

    /**
     * RequestBodySearch constructor.
     * @param ConnectionInterface $connection
     */
    public function __construct(ConnectionInterface $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @return Count\Response
     * @throws InvalidRawData
     */
    public function do(): Count\Response
    {
        $response = $this->connection->getClient()->search(
            $this->toDsl()
        );
        return Count\Response::fromRawData($response);
    }
}