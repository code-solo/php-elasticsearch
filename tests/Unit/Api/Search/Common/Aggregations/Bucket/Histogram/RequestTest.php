<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Aggregations\Bucket\Histogram;

use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\Histogram\Request;
use CodeSolo\ElasticsearchTests\Unit\AbstractTest;

class RequestTest extends AbstractTest
{
    public function test1()
    {
        $dsl = [
            'prices' => [
                'histogram' => [
                    'field' => 'price',
                    'interval' => 50,
                    'min_doc_count' => 1,
                    'extended_bounds' => [
                        'min' => 0,
                        'max' => 500,
                    ],
                    'keyed' => true,
                    'missing' => 0,
                ],
            ]
        ];
        $item = new Request('prices');
        $item
            ->setField('price')
            ->setInterval(50)
            ->setMinDocCount(1)
            ->setExtendedBounds(
                (new Request\ExtendedBounds())
                    ->setMin(0)
                    ->setMax(500)
            )
            ->setKeyed(true)
            ->setMissing(0);

        $this->assertArraySame($dsl, [
            $item->getName() => $item->toDsl()
        ]);
    }
}