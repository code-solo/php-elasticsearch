<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Aggregations\Bucket\Histogram;

use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\Histogram\Response;
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
                    'key' => 0.0,
                    'doc_count' => 1,
                ],
                [
                    'key' => 50.0,
                    'doc_count' => 1,
                ],
                [
                    'key' => 100.0,
                    'doc_count' => 0,
                ],
                [
                    'key' => 150.0,
                    'doc_count' => 2,
                ],
                [
                    'key' => 200.0,
                    'doc_count' => 3,
                ],
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
                '0.0' => [
                    'key' => 0.0,
                    'doc_count' => 1,
                ],
                '50.0' => [
                    'key' => 50.0,
                    'doc_count' => 1,
                ],
                '100.0' => [
                    'key' => 100.0,
                    'doc_count' => 0,
                ],
                '150.0' => [
                    'key' => 150.0,
                    'doc_count' => 2,
                ],
                '200.0' => [
                    'key' => 200.0,
                    'doc_count' => 3,
                ],
            ]
        ];
        $response = Response::fromRawData($data);
        $this->assertArraySame($data, $response->toRawData());
    }
}