<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Aggregations\Bucket\Range;

use CodeSolo\Elasticsearch\Api\Script;
use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\Range\Request;
use CodeSolo\ElasticsearchTests\Unit\AbstractTest;

class RequestTest extends AbstractTest
{
    public function test1()
    {
        $dsl = [
            'price_ranges' => [
                'range' => [
                    'field' => 'price',
                    'ranges' => [
                        [
                            'key' => 'cheap',
                            'from' => 100.0,
                            'to' => 200.0,
                        ],
                        [
                            'key' => 'average',
                            'from' => 100.0,
                            'to' => 200.0,
                        ],
                    ],
                    'keyed' => true,
                    'script' => [],
                ],
            ]
        ];
        $item = new Request('price_ranges');
        $item
            ->setField('price')
            ->setRanges([
                (new Request\Range())
                    ->setKey('cheap')
                    ->setFrom(100.0)
                    ->setTo(200.0),
                (new Request\Range())
                    ->setKey('average')
                    ->setFrom(100.0)
                    ->setTo(200.0),
            ])
            ->setKeyed(true)
            ->setScript(new Script());

        $this->assertArraySame($dsl, [
            $item->getName() => $item->toDsl()
        ]);
    }
}