<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Aggregations\Bucket\ReverseNested;

use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\ReverseNested\Request;
use CodeSolo\ElasticsearchTests\Unit\AbstractTest;

class RequestTest extends AbstractTest
{
    public function test1()
    {
        $dsl = [
            'comment_to_issue' => [
                'reverse_nested' => [
                    'path' => 'comments',
                ],
            ]
        ];
        $item = new Request('comment_to_issue');
        $item
            ->setPath('comments');

        $this->assertArraySame($dsl, [
            $item->getName() => $item->toDsl()
        ]);
    }
}