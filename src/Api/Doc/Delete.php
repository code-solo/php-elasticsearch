<?php

namespace CodeSolo\Elasticsearch\Api\Doc;

use CodeSolo\Elasticsearch\Api\AbstractRequest;
use CodeSolo\Elasticsearch\Api\Doc\Delete\Response;
use CodeSolo\Elasticsearch\Api\MultiDoc\Bulk\ToBulkDslInterface;
use CodeSolo\Elasticsearch\Client\ClientInterface;
use CodeSolo\Elasticsearch\Exception\InvalidRawData;

class Delete extends AbstractRequest implements ToBulkDslInterface
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
        $response = $this->client->getLowClient()->delete(
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
                    break;
                case 'client':
                    break;
                default:
                    $metaData[$key] = $value;
            }
        }
        return [
            [
                'delete' => $metaData
            ]
        ];
    }

    /**
     * @param string $index
     * @return static
     */
    public function setIndex(string $index): Delete
    {
        $this->index = $index;
        return $this;
    }

    /**
     * @param string $type
     * @return static
     */
    public function setType(string $type): Delete
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @param string $id
     * @return static
     */
    public function setId(string $id): Delete
    {
        $this->id = $id;
        return $this;
    }
}