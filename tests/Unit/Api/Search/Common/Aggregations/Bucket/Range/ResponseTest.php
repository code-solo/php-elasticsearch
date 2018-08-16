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
        return;
        $data = [];
        $response = Response::fromRawData($data);
        $this->assertArraySame($data, $response->toRawData());
    }
}