<?php

namespace CodeSolo\ElasticsearchTest\Api\Search\Aggregations;

use CodeSolo\Elasticsearch\Api\Search;
use CodeSolo\Elasticsearch\Connection\Connection;
use CodeSolo\Elasticsearch\Connection\ConnectionInterface;
use PHPUnit\Framework\TestCase;

abstract class BaseTest extends TestCase
{
    /**
     * @var ConnectionInterface
     */
    protected $connection;

    /**
     * @var string
     */
    protected $index = 'test_api_aggregations_index';

    /**
     * @var string
     */
    protected $type = 'data';

    /**
     * @var Search
     */
    protected $api;

    /**
     * @inheritdoc
     */
    public function setUp()
    {
        $this->connection = new Connection();
        $this->api = new Search($this->connection);
        $this->api
            ->setIndex($this->index)
            ->setType($this->type)
            ->setSize(0);

        for ($i = 0; $i < 500 ; $i++) {
            $this->connection->getClient()->index([
                'index' => $this->index,
                'type' => $this->type,
                'body' => [
                    'text1' => mt_rand(1, 20),
                    'text2' => mt_rand(1, 2),
                    'int1' => mt_rand(1, 20),
                ],
            ]);
        }
    }

    /**
     * @inheritdoc
     */
    public function tearDown()
    {
        $this->connection->getClient()->indices()->delete([
            'index' => $this->index,
        ]);
    }
}