<?php

namespace CodeSolo\Elasticsearch\Api\Search;

use CodeSolo\Elasticsearch\Api\AbstractRequest;
use CodeSolo\Elasticsearch\Api\Search\Common\Request\Query;
use CodeSolo\Elasticsearch\ClientInterface;
use CodeSolo\Elasticsearch\Exception\InvalidRawData;

class Validate extends AbstractRequest
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
        $this->body = new Validate\Request();
    }

    /**
     * @return Validate\Response
     * @throws InvalidRawData
     */
    public function do(): Validate\Response
    {
        $response = $this->client->getLowClient()->count(
            $this->toDsl()
        );
        return Validate\Response::fromRawData($response);
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