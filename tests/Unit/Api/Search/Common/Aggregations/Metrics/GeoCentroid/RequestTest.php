<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Aggregations\Metrics\GeoCentroid;

use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Metrics\GeoCentroid\Request;
use CodeSolo\ElasticsearchTests\Unit\AbstractTest;

class RequestTest extends AbstractTest
{
    /**
     * @return void
     */
    public function test1()
    {
        $dsl = [
            'centroid' => [
                'geo_centroid' => [
                    'field' => 'location',
                ],
            ]
        ];
        $item = new Request('centroid');
        $item
            ->setField('location');

        $this->assertArraySame($dsl, [
            $item->getName() => $item->toDsl()
        ]);
    }
}