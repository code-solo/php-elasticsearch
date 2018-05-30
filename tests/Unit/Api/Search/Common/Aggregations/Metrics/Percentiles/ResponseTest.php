<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Aggregations\Metrics\Percentiles;

use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Metrics\Percentiles\Response;
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
                '1.0' => 9.9,
                '5.0' => 29.500000000000004,
                '25.0' => 167.5,
                '50.0' => 445.0,
                '75.0' => 722.5,
                '95.0' => 940.5,
                '99.0' => 980.1000000000001
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
                    'key' => 1.0,
                    'value' => 9.9,
                ],
                [
                    'key' => 5.0,
                    'value' => 29.500000000000004,
                ],
                [
                    'key' => 25.0,
                    'value' => 167.5,
                ],
                [
                    'key' => 50.0,
                    'value' => 445.0,
                ],
                [
                    'key' => 75.0,
                    'value' => 722.5,
                ],
                [
                    'key' => 95.0,
                    'value' => 940.5,
                ],
                [
                    'key' => 99.0,
                    'value' => 980.1000000000001,
                ],
            ],
        ];
        $response = Response::fromRawData($data);
        $this->assertArraySame($data, $response->toRawData());
    }
}