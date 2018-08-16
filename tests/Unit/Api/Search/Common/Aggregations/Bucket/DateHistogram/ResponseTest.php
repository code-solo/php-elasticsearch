<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Aggregations\Bucket\DateHistogram;

use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\DateHistogram\Response;
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
                    'key_as_string' => '2015-01-01',
                    'key' => 1420070400000,
                    'doc_count' => 3,
                ],
                [
                    'key_as_string' => '2015-02-01',
                    'key' => 1422748800000,
                    'doc_count' => 2,
                ],
                [
                    'key_as_string' => '2015-03-01',
                    'key' => 1425168000000,
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
                '2015-01-01' => [
                    'key_as_string' => '2015-01-01',
                    'key' => 1420070400000,
                    'doc_count' => 3,
                ],
                '2015-02-01' => [
                    'key_as_string' => '2015-02-01',
                    'key' => 1422748800000,
                    'doc_count' => 2,
                ],
                '2015-03-01' => [
                    'key_as_string' => '2015-03-01',
                    'key' => 1425168000000,
                    'doc_count' => 2,
                ]
            ]
        ];
        $response = Response::fromRawData($data);
        $this->assertArraySame($data, $response->toRawData());
    }
}