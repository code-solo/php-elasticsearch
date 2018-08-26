<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\MultiDoc\MGet;

use CodeSolo\Elasticsearch\Api\MultiDoc\MGet;
use CodeSolo\ElasticsearchTests\Unit\AbstractTest;
use CodeSolo\ElasticsearchTests\Unit\Api\Connection;

class RequestTest extends AbstractTest
{
    public function test1()
    {
        $dsl = [
            'body' => [
                'docs' => [
                    [
                        '_index' => 'test',
                        '_type' => '_doc',
                        '_id' => '1',
                    ],
                    [
                        '_index' => 'test',
                        '_type' => '_doc',
                        '_id' => '2',
                    ],
                ],
            ],
        ];
        $request = new MGet(new Connection());
        $request
            ->setBody(
                (new MGet\Body())->setDocs([
                    (new MGet\Body\Doc())
                        ->setIndex('test')
                        ->setType('_doc')
                        ->setId('1'),
                    (new MGet\Body\Doc())
                        ->setIndex('test')
                        ->setType('_doc')
                        ->setId('2'),
                ])
            );

        $this->assertArraySame($dsl, $request->toDsl());
    }

    public function test2()
    {
        $dsl = [
            'index' => 'test',
            'body' => [
                'docs' => [
                    [
                        '_type' => '_doc',
                        '_id' => '1',
                    ],
                    [
                        '_type' => '_doc',
                        '_id' => '2',
                    ],
                ],
            ],
        ];
        $request = new MGet(new Connection());
        $request
            ->setIndex('test')
            ->setBody(
                (new MGet\Body())->setDocs([
                    (new MGet\Body\Doc())
                        ->setType('_doc')
                        ->setId('1'),
                    (new MGet\Body\Doc())
                        ->setType('_doc')
                        ->setId('2'),
                ])
            );

        $this->assertArraySame($dsl, $request->toDsl());
    }

    public function test3()
    {
        $dsl = [
            'index' => 'test',
            'type' => '_doc',
            'body' => [
                'docs' => [
                    [
                        '_id' => '1',
                    ],
                    [
                        '_id' => '2',
                    ],
                ],
            ],
        ];
        $request = new MGet(new Connection());
        $request
            ->setIndex('test')
            ->setType('_doc')
            ->setBody(
                (new MGet\Body())->setDocs([
                    (new MGet\Body\Doc())
                        ->setId('1'),
                    (new MGet\Body\Doc())
                        ->setId('2'),
                ])
            );

        $this->assertArraySame($dsl, $request->toDsl());
    }

    public function test4()
    {
        $dsl = [
            'index' => 'test',
            'type' => '_doc',
            'body' => [
                'ids' => [
                    '1',
                    '2'
                ]
            ],
        ];
        $request = new MGet(new Connection());
        $request
            ->setIndex('test')
            ->setType('_doc')
            ->setBody(
                (new MGet\Body())->setIds([
                    '1',
                    '2'
                ])
            );

        $this->assertArraySame($dsl, $request->toDsl());
    }
}