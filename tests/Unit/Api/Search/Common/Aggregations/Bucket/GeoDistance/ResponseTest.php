<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Aggregations\Bucket\GeoDistance;

use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\GeoDistance\Response;
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
            'buckets' => [
                [
                    'key' => '*-100000.0',
                    'from' => 0.0,
                    'to' => 100000.0,
                    'doc_count' => 3,
                ],
                [
                    'key' => '100000.0-300000.0',
                    'from' => 100000.0,
                    'to' => 300000.0,
                    'doc_count' => 1,
                ],
                [
                    'key' => '300000.0-*',
                    'from' => 300000.0,
                    'doc_count' => 2,
                ]
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
            'buckets' => [
                '*-100000.0' => [
                    'key' => '*-100000.0',
                    'from' => 0.0,
                    'to' => 100000.0,
                    'doc_count' => 3,
                ],
                '100000.0-300000.0' => [
                    'key' => '100000.0-300000.0',
                    'from' => 100000.0,
                    'to' => 300000.0,
                    'doc_count' => 1,
                ],
                '300000.0-*' => [
                    'key' => '300000.0-*',
                    'from' => 300000.0,
                    'doc_count' => 2,
                ]
            ]
        ];
        $response = Response::fromRawData($data);
        $this->assertArraySame($data, $response->toRawData());
    }
}