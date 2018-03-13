<?php

namespace CodeSolo\ElasticsearchTest\Api\Doc;

use CodeSolo\Elasticsearch\Api\Doc\Index;
use CodeSolo\Elasticsearch\Exception\InvalidRawData;

class IndexTest extends AbstractTest
{
    /**
     * @var Index
     */
    private $api;

    public function setUp()
    {
        parent::setUp();
        $this->api = new Index($this->connection);
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

        $this->assertInstanceOf(Index\Response::class, $response);
        $this->assertSame('created', $response->getResult());

        $response = $this->api
            ->setIndex($this->index)
            ->setType($this->type)
            ->setId($this->id)
            ->setBody($this->doc)
            ->do();

        $this->assertInstanceOf(Index\Response::class, $response);
        $this->assertSame('updated', $response->getResult());
    }
}