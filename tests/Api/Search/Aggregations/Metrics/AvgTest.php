<?php

namespace CodeSolo\ElasticsearchTest\Api\Search\Aggregations\Metrics;

use CodeSolo\Elasticsearch\Api\Search\Aggregations\Metrics\Avg\Request;
use CodeSolo\Elasticsearch\Api\Search\Request\Aggregations;
use CodeSolo\ElasticsearchTest\Api\Search\Aggregations\BaseTest;

class AvgTest extends BaseTest
{
    public function test1()
    {
        $aggs = new Aggregations();
        $avg = new Request('avg_int1');
        $avg->setField('int1');
        $aggs->addItem($avg);

        $this->api->setAggregations($aggs);

        $response = $this->api->do();
        $response->getAggregations()->getItem($avg);
        print_r($response);
    }
}