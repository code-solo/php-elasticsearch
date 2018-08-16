<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Aggregations\Bucket\Filter;

use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\Filter\Response;
use CodeSolo\ElasticsearchTests\Unit\AbstractTest;

class ResponseTest extends AbstractTest
{
    /**
     * @return void
     * @throws \CodeSolo\Elasticsearch\Exception\InvalidRawData
     */
    public function test1()
    {
        $data = [];
        $response = Response::fromRawData($data);
        $this->assertArraySame($data, $response->toRawData());
    }
}