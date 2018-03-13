<?php

namespace CodeSolo\ElasticsearchTest\Api\Doc;

use CodeSolo\Elasticsearch\Api\Doc\Update;
use CodeSolo\Elasticsearch\Exception\InvalidRawData;

class UpdateTest extends AbstractTest
{
    /**
     * @var Update
     */
    private $api;

    public function setUp()
    {
        parent::setUp();
        $this->api = new Update($this->connection);
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
            ->setBody([
                'doc' => $this->doc,
            ])
            ->do();

        $this->assertInstanceOf(Update\Response::class, $response);
        $this->assertSame('noop', $response->getResult());

        $response = $this->api
            ->setIndex($this->index)
            ->setType($this->type)
            ->setId($this->id)
            ->setBody([
                'doc' => [
                    'key1' => 'value1'
                ],
            ])
            ->do();

        $this->assertInstanceOf(Update\Response::class, $response);
        $this->assertSame('updated', $response->getResult());
    }
}