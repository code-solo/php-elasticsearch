<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Aggregations\Metrics;

use CodeSolo\Elasticsearch\Api\Search\Aggregations\Metrics\Avg\Request;
use CodeSolo\ElasticsearchTests\Unit\Api\Search\Aggregations\AbstractTest;

class AvgTest extends AbstractTest
{
    /**
     * @inheritdoc
     */
    protected function getFixtures(): array
    {
        return json_decode(file_get_contents(__DIR__ . '/fixtures/avg.json'));
    }

    public function testDsl()
    {
        $script =
        $item = new Request('my_avg');
        $item->setField('size');
        $item->setMissing(100);
        $dsl = $item->toDsl();
        print_r($dsl);
    }

    /**
     * @throws \CodeSolo\Elasticsearch\Exception\InvalidRawData
     */
//    public function test()
//    {
//        $item = new Request('my_avg');
//        $item->setField('size');
//        $item->setMissing(100);
//        $this->aggregations->addItem($item);
//        $response = $this->search->do();
//        print_r($response);
//    }
}