<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Aggregations\Bucket\SignificantTerms;

use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\SignificantTerms\Response;
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
            'doc_count' => 47347,
            'bg_count' => 5064554,
            'buckets' => [
                [
                    'key' => 'Bicycle theft',
                    'doc_count' => 3640,
                    'score' => 0.371235374214817,
                    'bg_count' => 66799,
                ]
            ]
        ];
        $response = Response::fromRawData($data);
        $this->assertArraySame($data, $response->toRawData());
    }
}