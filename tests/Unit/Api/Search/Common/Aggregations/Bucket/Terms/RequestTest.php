<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Aggregations\Bucket\Terms;

use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\Terms\Request;
use CodeSolo\ElasticsearchTests\Unit\AbstractTest;

class RequestTest extends AbstractTest
{
    public function test1()
    {
        $dsl = [
            'genres' => [
                'terms' => [],
            ]
        ];
        $item = new Request('genres');

        $this->assertArraySame($dsl, [
            $item->getName() => $item->toDsl()
        ]);
    }
}