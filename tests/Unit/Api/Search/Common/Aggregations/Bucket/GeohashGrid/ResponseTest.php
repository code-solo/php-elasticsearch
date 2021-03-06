<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Aggregations\Bucket\GeohashGrid;

use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\GeohashGrid\Response;
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
                    'key' => 'u17',
                    'doc_count' => 3,
                ],
                [
                    'key' => 'u09',
                    'doc_count' => 2,
                ],
                [
                    'key' => 'u15',
                    'doc_count' => 1,
                ],
            ],
        ];
        $response = Response::fromRawData($data);
        $this->assertArraySame($data, $response->toRawData());
    }
}