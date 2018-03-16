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
        $item1 = new Search\Aggregations\Bucket\Terms\Request('agg1', 'key1');
        $item2 = new Search\Aggregations\Bucket\Terms\Request('agg2', 'key2');
        $item1->addAggregationsItem($item2);

        $agg = new Search\Request\Aggregations();
        $agg->addItem($item1);
        $this->api->setAggregations(
            $agg
        );

        $resp = $this->api->do();
        /** @var Search\Aggregations\Bucket\Terms\Response $resp1 */
        $resp1 = $resp->getAggregations()->getItem($item1);
        foreach ($resp1->getBuckets() as $bucket) {
            $bucket->getItem($item2);
        }

        print_r($resp1);
    }
}