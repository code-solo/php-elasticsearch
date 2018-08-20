<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Aggregations\Bucket\Sampler;

use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\Sampler\Response;
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
            'doc_count' => 200,
            'bg_count' => 650,
            'buckets' => [
                [
                    'key' => 'elasticsearch',
                    'doc_count' => 150,
                    'score' => 1.078125,
                    'bg_count' => 200,
                ],
                [
                    'key' => 'logstash',
                    'doc_count' => 50,
                    'score' => 0.5625,
                    'bg_count' => 50,
                ],
            ],
        ];
        $response = Response::fromRawData($data);
        $this->assertArraySame($data, $response->toRawData());
    }
}