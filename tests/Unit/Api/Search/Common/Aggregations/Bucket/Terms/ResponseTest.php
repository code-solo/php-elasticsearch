<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Aggregations\Bucket\Terms;

use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\Terms\Response;
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
            'doc_count_error_upper_bound' => 46,
            'sum_other_doc_count' => 79,
            'buckets' => [
                [
                    'key' => 'Product A',
                    'doc_count' => 100,
                    'doc_count_error_upper_bound' => 0,
                ],
                [
                    'key' => 'Product Z',
                    'doc_count' => 52,
                    'doc_count_error_upper_bound' => 2,
                ],
            ],
        ];
        $response = Response::fromRawData($data);
        $this->assertArraySame($data, $response->toRawData());
    }
}