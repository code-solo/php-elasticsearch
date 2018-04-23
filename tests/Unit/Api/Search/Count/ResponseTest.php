<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Count;

use CodeSolo\Elasticsearch\Api\Search\Count\Response;
use CodeSolo\ElasticsearchTests\Unit\AbstractTest;

class ResponseTest extends AbstractTest
{
    /**
     * @return void
     */
    public function test1()
    {
        $data = [
            'count' => 0,
            '_shards' => [
                'total' => 1,
                'successful' => 1,
                'skipped' => 0,
                'failed' => 0,
            ],
        ];
        $response = Response::fromRawData($data);
        $this->assertArraySame($data, $response->toRawData());
    }
}