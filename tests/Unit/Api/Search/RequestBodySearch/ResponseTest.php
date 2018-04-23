<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\RequestBodySearch;

use CodeSolo\Elasticsearch\Api\Search\RequestBodySearch\Response;
use CodeSolo\ElasticsearchTests\Unit\AbstractTest;

class ResponseTest extends AbstractTest
{
    /**
     * @return void
     */
    public function test1()
    {
        $data = [
            'took' => 1,
            'timed_out' => false,
            '_shards' => [
                'total' => 1,
                'successful' => 1,
                'skipped' => 0,
                'failed' => 0,
            ],
            'hits' => [
                'total' => 0,
                'hits' => [],
            ],
        ];
        $response = Response::fromRawData($data);
        $this->assertArraySame($data, $response->toRawData());
    }
}