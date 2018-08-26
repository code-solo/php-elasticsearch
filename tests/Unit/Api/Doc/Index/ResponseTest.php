<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Doc\Index;

use CodeSolo\Elasticsearch\Api\Doc\Index\Response;
use CodeSolo\ElasticsearchTests\Unit\AbstractTest;

class ResponseTest extends AbstractTest
{
    public function test1()
    {
        $data = [
            '_shards' => [
                'total' => 2,
                'failed' => 0,
                'successful' => 2
            ],
            '_index' => 'twitter',
            '_type' => '_doc',
            '_id' => '1',
            '_version' => 1,
            '_seq_no' => 0,
            '_primary_term' => 1,
            'result' => 'created',
        ];
        $response = Response::fromRawData($data);
        $this->assertArraySame($data, $response->toRawData());
    }
}