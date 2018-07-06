<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Aggregations\Bucket\Missing;

use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\Missing\Request;
use CodeSolo\ElasticsearchTests\Unit\AbstractTest;

class RequestTest extends AbstractTest
{
    public function test1()
    {
        $dsl = [
            'products_without_a_price' => [
                'missing' => [
                    'field' => 'price',
                ],
            ]
        ];
        $item = new Request('products_without_a_price');
        $item
            ->setField('price');

        $this->assertArraySame($dsl, [
            $item->getName() => $item->toDsl()
        ]);
    }
}