<?php

namespace CodeSolo\ElasticsearchTest\Api\Search;

use CodeSolo\Elasticsearch\Api\Search;
use CodeSolo\Elasticsearch\Connection\Connection;
use CodeSolo\Elasticsearch\Connection\ConnectionInterface;
use PHPUnit\Framework\TestCase;

class AggregationsTest extends TestCase
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
    private $api;

    public function setUp()
    {
        $this->connection = new Connection();
        $this->api = new Search($this->connection);

        for ($i = 0; $i < 500 ; $i++) {
            $this->connection->getClient()->index([
                'index' => $this->index,
                'type' => $this->type,
                'body' => [
                    'key1' => mt_rand(1, 20),
                    'key2' => mt_rand(1, 2),
                ],
            ]);
        }
    }

    public function tearDown()
    {
        $this->connection->getClient()->indices()->delete([
            'index' => $this->index,
        ]);
    }

    public function test()
    {
        $agg = new Search\Request\Aggregations();
        $agg->add(
            (new Search\Aggregations\Bucket\Terms\Request('agg1', 'key1'))
                ->add(new Search\Aggregations\Bucket\Terms\Request('agg2', 'key2'))
        );
        $this->api->setAggregations(
            $agg
        );

        $this->api->do();
    }
}