<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Aggregations\Metrics\PercentileRanks;

use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Metrics\PercentileRanks\Response;
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
            'values' => [
                '500.0' => 55.00000000000001,
                '600.0' => 64.0,
            ]
        ];
        $response = Response::fromRawData($data);
        $this->assertArraySame($data, $response->toRawData());
    }

    /**
     * @return void
     * @throws \CodeSolo\Elasticsearch\Exception\InvalidRawData
     */
    public function test2()
    {
        $data = [
            'values' => [
                [
                    'key' => 500.0,
                    'value' => 55.00000000000001,
                ],
                [
                    'key' => 600.0,
                    'value' => 64.0,
                ],
            ],
        ];
        $response = Response::fromRawData($data);
        $this->assertArraySame($data, $response->toRawData());
    }
}