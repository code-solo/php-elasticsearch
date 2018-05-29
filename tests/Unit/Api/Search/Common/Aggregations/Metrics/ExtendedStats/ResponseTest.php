<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Aggregations\Metrics\ExtendedStats;

use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Metrics\ExtendedStats\Response;
use CodeSolo\ElasticsearchTests\Unit\AbstractTest;

class ResponseTest extends AbstractTest
{
    public function test1()
    {
        $data = [
            'count' => 2,
            'min' => 50.0,
            'max' => 100.0,
            'avg' => 75.0,
            'sum' => 150.0,
            'sum_of_squares' => 12500.0,
            'variance' => 625.0,
            'std_deviation' => 25.0,
            'std_deviation_bounds' => [
                'upper' => 125.0,
                'lower' => 25.0
            ],
        ];
        $response = Response::fromRawData($data);
        $this->assertArraySame($data, $response->toRawData());
    }
}