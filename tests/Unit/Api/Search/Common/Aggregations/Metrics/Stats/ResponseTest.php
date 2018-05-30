<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Aggregations\Metrics\Stats;

use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Metrics\Stats\Response;
use CodeSolo\ElasticsearchTests\Unit\AbstractTest;

class ResponseTest extends AbstractTest
{
    /**
     * @return void
     * @throws \CodeSolo\Elasticsearch\Exception\InvalidRawData
     */
    public function test1()
    {
        $data = [
            'count' => 2,
            'min' => 50.0,
            'max' => 100.0,
            'avg' => 75.0,
            'sum' => 150.0,
        ];
        $response = Response::fromRawData($data);
        $this->assertArraySame($data, $response->toRawData());
    }
}