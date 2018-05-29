<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Aggregations\Metrics\Max;

use CodeSolo\Elasticsearch\Api\Script;
use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Metrics\Max\Request;
use CodeSolo\ElasticsearchTests\Unit\AbstractTest;

class RequestTest extends AbstractTest
{
    /**
     * @return void
     */
    public function test1()
    {
        $dsl = [
            'max_price' => [
                'max' => [
                    'field' => 'price',
                    'missing' => 10,
                    'script' => [],
                ],
            ]
        ];
        $item = new Request('max_price');
        $item
            ->setField('price')
            ->setMissing(10)
            ->setScript(new Script());

        $this->assertArraySame($dsl, [
            $item->getName() => $item->toDsl()
        ]);
    }
}