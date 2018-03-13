<?php

namespace CodeSolo\ElasticsearchTest\Api\Doc;

use CodeSolo\Elasticsearch\Api\Doc\Get;
use CodeSolo\Elasticsearch\Exception\InvalidRawData;

class GetTest extends AbstractTest
{
    /**
     * @var Get
     */
    private $api;

    public function setUp()
    {
        parent::setUp();
        $this->api = new Get($this->connection);
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

        $this->assertInstanceOf(Get\Response::class, $response);
        $this->assertTrue($response->getFound());
    }
}