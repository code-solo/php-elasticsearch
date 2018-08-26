<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Doc\Update;

use CodeSolo\Elasticsearch\Api\Doc\Update;
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
                'doc' => [
                    'name' => 'new_name',
                ],
            ],
        ];
        $request = new Update(new Connection());
        $request
            ->setIndex('twitter')
            ->setType('_doc')
            ->setId('1')
            ->setBody([
                'doc' => [
                    'name' => 'new_name',
                ],
            ]);

        $this->assertArraySame($dsl, $request->toDsl());
    }
}