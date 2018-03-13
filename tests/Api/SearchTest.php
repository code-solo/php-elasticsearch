<?php

namespace CodeSolo\ElasticsearchTest\Api;

use CodeSolo\Elasticsearch\Api\Search;
use CodeSolo\Elasticsearch\Connection\Connection;
use CodeSolo\Elasticsearch\Connection\ConnectionInterface;
use PHPUnit\Framework\TestCase;

class SearchTest extends TestCase
{
    /**
     * @var ConnectionInterface
     */
    protected $connection;

    /**
     * @var string
     */
    protected $index = 'test_api_search_index';

    /**
     * @var string
     */
    protected $type = 'data';

    /**
     * @var Search
     */
    private $api;

    public function setUp()
    {
        $this->connection = new Connection();
        $this->api = new Search($this->connection);

        for ($i = 0; $i < 50 ; $i++) {
            $this->connection->getClient()->index([
                'index' => $this->index,
                'type' => $this->type,
                'body' => [
                    'key' => 'value'
                ],
            ]);
        }
    }

//    public function tearDown()
//    {
//        $this->connection->getClient()->indices()->delete([
//            'index' => $this->index,
//        ]);
//    }

    public function test()
    {
        $this->api
            ->setIndex($this->index)
            ->setType($this->type)
            ->do();
    }
}