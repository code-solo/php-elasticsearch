<?php

namespace CodeSolo\Elasticsearch\Api\Doc;

use CodeSolo\Elasticsearch\Api\AbstractRequest;
use CodeSolo\Elasticsearch\Api\Doc\Create\Response;
use CodeSolo\Elasticsearch\Api\MultiDoc\Bulk\ToBulkDslInterface;
use CodeSolo\Elasticsearch\Client\ClientInterface;
use CodeSolo\Elasticsearch\Exception\InvalidRawData;

class Create extends AbstractRequest implements ToBulkDslInterface
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
        $response = $this->client->getLowClient()->create(
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
        $dsl['body'] = $this->body ?? (object) [];
        if (!is_null($this->id)) {
            $dsl['id'] = $this->id;
        }
        return $dsl;
    }

    /**
     * @return array
     */
    public function toBulkDsl(): array
    {
        $dsl = $this->toDsl();
        $metaData = [];
        foreach ($dsl as $key => $value) {
            switch ($key) {
                case 'index':
                case 'type':
                case 'id':
                    $metaData['_' . $key] = $value;
                    break;
                case 'body':
                    $source = $value;
                    break;
                default:
                    $metaData[$key] = $value;
            }
        }
        return [
            [
                'create' => $metaData
            ],
            $source ?? (object) []
        ];
    }

    /**
     * @param string $index
     * @return static
     */
    public function setIndex(string $index): Create
    {
        $this->index = $index;
        return $this;
    }

    /**
     * @param string $type
     * @return static
     */
    public function setType(string $type): Create
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @param string $id
     * @return static
     */
    public function setId(string $id): Create
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param array $body
     * @return static
     */
    public function setBody(array $body): Create
    {
        $this->body = $body;
        return $this;
    }
}