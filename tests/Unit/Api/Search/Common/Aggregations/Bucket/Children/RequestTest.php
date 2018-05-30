<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Aggregations\Bucket\Children;

use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\Children\Request;
use CodeSolo\ElasticsearchTests\Unit\AbstractTest;

class RequestTest extends AbstractTest
{
    /**
     * @return void
     */
    public function test1()
    {
        $dsl = [
            'to-answers' => [
                'children' => [
                    'type' => 'answer',
                ],
            ]
        ];
        $item = new Request('to-answers');
        $item
            ->setType('answer');

        $this->assertArraySame($dsl, [
            $item->getName() => $item->toDsl()
        ]);
    }
}