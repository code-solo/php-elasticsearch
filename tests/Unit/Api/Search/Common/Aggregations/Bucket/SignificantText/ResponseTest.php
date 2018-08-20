<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Aggregations\Bucket\SignificantText;

use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\SignificantText\Response;
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
            'doc_count' => 100,
            'buckets' => [
                [
                    'key' => 'h5n1',
                    'doc_count' => 4,
                    'score' => 4.71235374214817,
                    'bg_count' => 5,
                ],
            ],
        ];
        $response = Response::fromRawData($data);
        $this->assertArraySame($data, $response->toRawData());
    }
}