<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Doc\Get;

use CodeSolo\Elasticsearch\Api\Doc\Get;
use CodeSolo\ElasticsearchTests\Unit\AbstractTest;
use CodeSolo\ElasticsearchTests\Unit\Api\Connection;

class RequestTest extends AbstractTest
{
    public function test1()
    {
        $dsl = [
            'index' => 'twitter',
            'type' => '_doc',
            'id' => '0',
            'client' => [
                'ignore' => 404,
            ],
        ];
        $request = new Get(new Connection());
        $request
            ->setIndex('twitter')
            ->setType('_doc')
            ->setId('0');

        $this->assertArraySame($dsl, $request->toDsl());
    }
}