<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Aggregations\Bucket\Range;

use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\Range\Response;
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
                    'key' => '*-100.0',
                    'to' => 100.0,
                    'doc_count' => 2,
                ],
                [
                    'key' => '100.0-200.0',
                    'from' => 100.0,
                    'to' => 200.0,
                    'doc_count' => 2,
                ],
                [
                    'key' => '200.0-*',
                    'from' => 200.0,
                    'doc_count' => 3,
                ],
            ],
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
                '*-100.0' => [
                    'key' => '*-100.0',
                    'to' => 100.0,
                    'doc_count' => 2,
                ],
                '100.0-200.0' => [
                    'key' => '100.0-200.0',
                    'from' => 100.0,
                    'to' => 200.0,
                    'doc_count' => 2,
                ],
                '200.0-*' => [
                    'key' => '200.0-*',
                    'from' => 200.0,
                    'doc_count' => 3,
                ],
            ],
        ];
        $response = Response::fromRawData($data);
        $this->assertArraySame($data, $response->toRawData());
    }
}