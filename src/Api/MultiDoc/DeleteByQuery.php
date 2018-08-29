<?php

namespace CodeSolo\Elasticsearch\Api\MultiDoc;

use CodeSolo\Elasticsearch\Api\AbstractRequest;
use CodeSolo\Elasticsearch\Api\MultiDoc\DeleteByQuery\Response;
use CodeSolo\Elasticsearch\Client\ClientInterface;
use CodeSolo\Elasticsearch\Exception\InvalidRawData;

class DeleteByQuery extends AbstractRequest
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
     * @var array
     */
    private $body;

    /**
     * Index constructor.
     * @param ClientInterface $client
     */
    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @return Response
     * @throws InvalidRawData
     */
    public function do(): Response
    {
        $response = $this->client->getLowClient()->deleteByQuery(
            $this->toDsl()
        );
        return Response::fromRawData($response);
    }

    /**
     * @return array
     */
    public function toDsl(): array
    {
        $dsl = parent::toDsl();
        $dsl['index'] = $this->index;
        $dsl['body'] = $this->body;
        if (!is_null($this->type)) {
            $dsl['type'] = $this->type;
        }
        return $dsl;
    }

    /**
     * @param string $index
     * @return static
     */
    public function setIndex(string $index): DeleteByQuery
    {
        $this->index = $index;
        return $this;
    }

    /**
     * @param string $type
     * @return static
     */
    public function setType(string $type): DeleteByQuery
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @param array $body
     * @return static
     */
    public function setBody(array $body): DeleteByQuery
    {
        $this->body = $body;
        return $this;
    }
}