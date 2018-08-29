<?php

namespace CodeSolo\Elasticsearch\Api\Search;

use CodeSolo\Elasticsearch\Api\AbstractRequest;
use CodeSolo\Elasticsearch\Api\Search\Common\Request\Aggregations;
use CodeSolo\Elasticsearch\Api\Search\Common\Request\Query;
use CodeSolo\Elasticsearch\Client\ClientInterface;
use CodeSolo\Elasticsearch\Exception\InvalidRawData;

class RequestBodySearch extends AbstractRequest
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
     * @var RequestBodySearch\Request
     */
    private $body;

    /**
     * RequestBodySearch constructor.
     * @param ClientInterface $client
     */
    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
        $this->body = new RequestBodySearch\Request();
    }

    /**
     * @return RequestBodySearch\Response
     * @throws InvalidRawData
     */
    public function do(): RequestBodySearch\Response
    {
        $response = $this->client->getLowClient()->search(
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
     * @param Query $query
     * @return static
     */
    public function setQuery(Query $query): RequestBodySearch
    {
        $this->body->setQuery($query);
        return $this;
    }

    /**
     * @param Aggregations $aggregations
     * @return static
     */
    public function setAggregations(Aggregations $aggregations): RequestBodySearch
    {
        $this->body->setAggregations($aggregations);
        return $this;
    }
}