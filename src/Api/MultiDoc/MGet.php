<?php

namespace CodeSolo\Elasticsearch\Api\MultiDoc;

use CodeSolo\Elasticsearch\Api\AbstractRequest;
use CodeSolo\Elasticsearch\Api\MultiDoc\MGet\Response;
use CodeSolo\Elasticsearch\ClientInterface;
use CodeSolo\Elasticsearch\Exception\InvalidRawData;

class MGet extends AbstractRequest
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
     * @var MGet\Body
     */
    private $body;

    /**
     * MultiGet constructor.
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
        $response = $this->client->getLowClient()->mget(
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
        if (!is_null($this->body)) {
            $dsl['body'] = $this->body->toDsl();
        }
        if (!is_null($this->index)) {
            $dsl['index'] = $this->index;
        }
        if (!is_null($this->type)) {
            $dsl['type'] = $this->type;
        }
        return $dsl;
    }

    /**
     * @param string $index
     * @return static
     */
    public function setIndex(string $index): MGet
    {
        $this->index = $index;
        return $this;
    }

    /**
     * @param string $type
     * @return static
     */
    public function setType(string $type): MGet
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @param MGet\Body $body
     * @return static
     */
    public function setBody(MGet\Body $body): MGet
    {
        $this->body = $body;
        return $this;
    }
}