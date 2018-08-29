<?php

namespace CodeSolo\Elasticsearch\Api\Search;

use CodeSolo\Elasticsearch\Api\AbstractRequest;
use CodeSolo\Elasticsearch\Api\Search\Common\Request\Query;
use CodeSolo\Elasticsearch\Client\ClientInterface;
use CodeSolo\Elasticsearch\Exception\InvalidRawData;

class Count extends AbstractRequest
{
    /**
     * @var ClientInterface
     */
    private $client;

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
     * @param ClientInterface $client
     */
    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
        $this->body = new Count\Request();
    }

    /**
     * @return Count\Response
     * @throws InvalidRawData
     */
    public function do(): Count\Response
    {
        $response = $this->client->getLowClient()->count(
            $this->toDsl()
        );
        return Count\Response::fromRawData($response);
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
    public function setIndex(string $index): Count
    {
        $this->index = $index;
        return $this;
    }

    /**
     * @param string $type
     * @return static
     */
    public function setType(string $type): Count
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @param Query $query
     * @return static
     */
    public function setQuery(Query $query): Count
    {
        $this->body->setQuery($query);
        return $this;
    }
}