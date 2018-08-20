<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Aggregations\Bucket\IpRange;

use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\IpRange\Response;
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
                    'to' => '10.0.0.5',
                    'doc_count' => 10,
                ],
                [
                    'from' => '10.0.0.5',
                    'doc_count' => 260,
                ]
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
                [
                    'key' => '10.0.0.0/25',
                    'from' => '10.0.0.0',
                    'to' => '10.0.0.128',
                    'doc_count' => 128,
                ],
                [
                    'key' => '10.0.0.127/25',
                    'from' => '10.0.0.0',
                    'to' => '10.0.0.128',
                    'doc_count' => 128,
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
    public function test3()
    {
        $data = [
            'buckets' => [
                '10.0.0.5' => [
                    'to' => '10.0.0.5',
                    'doc_count' => 10,
                ],
                '10.0.0.6' => [
                    'from' => '10.0.0.6',
                    'doc_count' => 260,
                ]
            ],
        ];
        $response = Response::fromRawData($data);
        $this->assertArraySame($data, $response->toRawData());
    }
}