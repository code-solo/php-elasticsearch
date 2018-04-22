<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Response;

use CodeSolo\Elasticsearch\Api\Search\Common\Response\Shards;
use CodeSolo\ElasticsearchTests\Unit\AbstractTest;

class ShardsTest extends AbstractTest
{
    public function test1()
    {
        $data = [];
        $shards = Shards::fromRawData($data);
        $this->assertArraySame($data, $shards->toRawData());
    }
}