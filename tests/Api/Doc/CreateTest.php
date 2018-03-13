<?php

namespace CodeSolo\ElasticsearchTest\Api\Doc;

use CodeSolo\Elasticsearch\Api\Doc\Create;
use CodeSolo\Elasticsearch\Exception\InvalidRawData;

class CreateTest extends AbstractTest
{
    /**
     * @var Create
     */
    private $api;

    public function setUp()
    {
        parent::setUp();
        $this->api = new Create($this->connection);
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
            ->setBody($this->doc)
            ->do();

        $this->assertInstanceOf(Create\Response::class, $response);
        $this->assertSame('created', $response->getResult());
    }
}