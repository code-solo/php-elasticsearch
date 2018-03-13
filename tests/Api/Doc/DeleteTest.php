<?php

namespace CodeSolo\ElasticsearchTest\Api\Doc;

use CodeSolo\Elasticsearch\Api\Doc\Delete;
use CodeSolo\Elasticsearch\Exception\InvalidRawData;

class DeleteTest extends AbstractTest
{
    /**
     * @var Delete
     */
    private $api;

    public function setUp()
    {
        parent::setUp();
        $this->api = new Delete($this->connection);
        $this->connection->getClient()->create([
            'index' => $this->index,
            'type' => $this->type,
            'id' => $this->id,
            'body' => $this->doc,
        ]);
    }

    /**
     * @throws InvalidRawData
     */
    public function test()
    {
        $response = $this->api
            ->setIndex($this->index)
            ->setType($this->type)
            ->setId($this->id)
            ->do();

        $this->assertInstanceOf(Delete\Response::class, $response);
        $this->assertSame('deleted', $response->getResult());

        $response = $this->api
            ->setIndex($this->index)
            ->setType($this->type)
            ->setId($this->id . 'salt')
            ->do();

        $this->assertInstanceOf(Delete\Response::class, $response);
        $this->assertSame('not_found', $response->getResult());
    }
}