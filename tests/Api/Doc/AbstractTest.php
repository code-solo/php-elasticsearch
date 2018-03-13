<?php

namespace CodeSolo\ElasticsearchTest\Api\Doc;

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
    protected $index = 'test_api_doc_index';

    /**
     * @var string
     */
    protected $type = 'data';

    /**
     * @var string
     */
    protected $id = '1';

    /**
     * @var array
     */
    protected $doc = [
        'key' => 'value',
    ];

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