<?php

namespace CodeSolo\ElasticsearchTest\Api\MultiDoc;

use PHPUnit\Framework\TestCase;
use CodeSolo\Elasticsearch\Connection\Connection;
use CodeSolo\Elasticsearch\Connection\ConnectionInterface;

abstract class AbstractTest extends TestCase
{
    /**
     * @var ConnectionInterface
     */
    protected $connection;

    /**
     * @var string
     */
    protected $index = 'test_api_multi_doc_index';

    /**
     * @var string
     */
    protected $type = 'data';

    public function setUp()
    {
        $this->connection = new Connection();
    }

    public function tearDown()
    {
        $this->connection->getClient()->indices()->delete([
            'index' => $this->index,
        ]);
    }
}