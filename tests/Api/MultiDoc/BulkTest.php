<?php

namespace CodeSolo\ElasticsearchTest\Api\MultiDoc;

use CodeSolo\Elasticsearch\Api\Doc\Create;
use CodeSolo\Elasticsearch\Api\Doc\Delete;
use CodeSolo\Elasticsearch\Api\Doc\Index;
use CodeSolo\Elasticsearch\Api\Doc\Update;
use CodeSolo\Elasticsearch\Api\MultiDoc\Bulk;
use CodeSolo\Elasticsearch\Exception\InvalidRawData;

class BulkTest extends AbstractTest
{
    /**
     * @var Bulk
     */
    private $api;

    private $createDocId = 'create_doc';
    private $deleteDocId = 'delete_doc';
    private $indexDocId = 'index_doc';
    private $updateDocId = 'update_doc';

    private $doc = [
        'key' => 'value',
    ];

    public function setUp()
    {
        parent::setUp();
        $this->api = new Bulk($this->connection);
        $this->connection->getClient()->create([
            'index' => $this->index,
            'type' => $this->type,
            'id' => $this->deleteDocId,
            'body' => $this->doc,
        ]);
        $this->connection->getClient()->create([
            'index' => $this->index,
            'type' => $this->type,
            'id' => $this->updateDocId,
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
            ->add(
                (new Create($this->connection))
                ->setId($this->createDocId)
                ->setBody($this->doc)
            )
            ->add(
                (new Delete($this->connection))
                ->setId($this->deleteDocId)
            )
            ->add(
                (new Index($this->connection))
                ->setId($this->indexDocId)
                ->setBody($this->doc)
            )
            ->add(
                (new Update($this->connection))
                ->setId($this->updateDocId)
                ->setBody([
                    'doc' => $this->doc
                ])
            )
            ->do();

        $this->assertInstanceOf(Bulk\Response::class, $response);
    }
}