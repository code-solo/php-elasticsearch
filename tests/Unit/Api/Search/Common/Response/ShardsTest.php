<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Response;

use CodeSolo\Elasticsearch\Api\Search\Common\Response\Shards;
use CodeSolo\ElasticsearchTests\Unit\AbstractTest;

class ShardsTest extends AbstractTest
{
    /**
     * @return void
     */
    public function test1()
    {
        $data = [
            'total' => 1,
            'successful' => 1,
            'skipped' => 0,
            'failed' => 0,
        ];
        $shards = Shards::fromRawData($data);
        $this->assertArraySame($data, $shards->toRawData());
    }
}