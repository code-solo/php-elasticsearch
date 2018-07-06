<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Aggregations\Bucket\Nested;

use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\Nested\Request;
use CodeSolo\ElasticsearchTests\Unit\AbstractTest;

class RequestTest extends AbstractTest
{
    public function test1()
    {
        $dsl = [
            'resellers' => [
                'nested' => [
                    'path' => 'resellers',
                ],
            ]
        ];
        $item = new Request('resellers');
        $item
            ->setPath('resellers');

        $this->assertArraySame($dsl, [
            $item->getName() => $item->toDsl()
        ]);
    }
}