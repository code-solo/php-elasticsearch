<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Doc\Create;

use CodeSolo\Elasticsearch\Api\Doc\Create;
use CodeSolo\ElasticsearchTests\Unit\AbstractTest;
use CodeSolo\ElasticsearchTests\Unit\Api\Connection;

class RequestTest extends AbstractTest
{
    public function test1()
    {
        $dsl = [
            'index' => 'twitter',
            'type' => '_doc',
            'id' => '1',
            'body' => [
                'user' => 'kimchy',
                'post_date' => '2009-11-15T14:12:12',
                'message' => 'trying out Elasticsearch',
            ],
        ];
        $request = new Create(new Connection());
        $request
            ->setIndex('twitter')
            ->setType('_doc')
            ->setId('1')
            ->setBody([
                'user' => 'kimchy',
                'post_date' => '2009-11-15T14:12:12',
                'message' => 'trying out Elasticsearch',
            ]);

        $this->assertArraySame($dsl, $request->toDsl());
    }
}