<?php

namespace CodeSolo\Elasticsearch\Api\Doc;

use CodeSolo\Elasticsearch\Api\AbstractRequest;
use CodeSolo\Elasticsearch\Api\Doc\Get\Response;
use CodeSolo\Elasticsearch\Client\ClientInterface;
use CodeSolo\Elasticsearch\Exception\InvalidRawData;

class Get extends AbstractRequest
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
     * @var string
     */
    private $id;

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
        $response = $this->client->getLowClient()->get(
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
        $dsl['type'] = $this->type;
        $dsl['id'] = $this->id;
        $dsl['client'] = [
            'ignore' => 404
        ];
        return $dsl;
    }

    /**
     * @param string $index
     * @return static
     */
    public function setIndex(string $index): Get
    {
        $this->index = $index;
        return $this;
    }

    /**
     * @param string $type
     * @return static
     */
    public function setType(string $type): Get
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @param string $id
     * @return static
     */
    public function setId(string $id): Get
    {
        $this->id = $id;
        return $this;
    }
}