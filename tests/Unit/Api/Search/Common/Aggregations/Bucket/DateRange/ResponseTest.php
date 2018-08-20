<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Aggregations\Bucket\DateRange;

use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\DateRange\Response;
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
                    'to' => 1.4436576E12,
                    'to_as_string' => '10-2015',
                    'doc_count' => 7,
                    'key' => '*-10-2015',
                ],
                [
                    'from' => 1.4436576E12,
                    'from_as_string' => '10-2015',
                    'doc_count' => 0,
                    'key' => '10-2015-*',
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
                '*-10-2015' => [
                    'to' => 1.4436576E12,
                    'to_as_string' => '10-2015',
                    'doc_count' => 7,
                    'key' => '*-10-2015',
                ],
                '10-2015-*' => [
                    'from' => 1.4436576E12,
                    'from_as_string' => '10-2015',
                    'doc_count' => 0,
                    'key' => '10-2015-*',
                ],
            ]
        ];
        $response = Response::fromRawData($data);
        $this->assertArraySame($data, $response->toRawData());
    }
}