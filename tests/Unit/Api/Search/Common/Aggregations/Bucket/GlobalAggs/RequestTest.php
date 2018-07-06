<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Aggregations\Bucket\GlobalAggs;

use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\GlobalAggs\Request;
use CodeSolo\ElasticsearchTests\Unit\AbstractTest;

class RequestTest extends AbstractTest
{
    public function test1()
    {
        $dsl = [
            'all_products' => [
                'global' => [],
            ]
        ];
        $item = new Request('all_products');

        $this->assertArraySame($dsl, [
            $item->getName() => $item->toDsl()
        ]);
    }
}