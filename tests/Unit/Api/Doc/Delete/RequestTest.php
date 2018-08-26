<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Doc\Delete;

use CodeSolo\Elasticsearch\Api\Doc\Delete;
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
            'client' => [
                'ignore' => 404,
            ],
        ];
        $request = new Delete(new Connection());
        $request
            ->setIndex('twitter')
            ->setType('_doc')
            ->setId('1');

        $this->assertArraySame($dsl, $request->toDsl());
    }
}