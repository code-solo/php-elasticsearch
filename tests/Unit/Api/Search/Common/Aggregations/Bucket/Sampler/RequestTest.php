<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Aggregations\Bucket\Sampler;

use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\Sampler\Request;
use CodeSolo\ElasticsearchTests\Unit\AbstractTest;

class RequestTest extends AbstractTest
{
    public function test1()
    {
        $dsl = [
            'sample' => [
                'sampler' => [
                    'shard_size' => 200,
                ],
            ]
        ];
        $item = new Request('sample');
        $item
            ->setShardSize(200);

        $this->assertArraySame($dsl, [
            $item->getName() => $item->toDsl()
        ]);
    }
}