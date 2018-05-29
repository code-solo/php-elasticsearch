<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Aggregations\Metrics\GeoBounds;

use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Metrics\GeoBounds\Request;
use CodeSolo\ElasticsearchTests\Unit\AbstractTest;

class RequestTest extends AbstractTest
{
    /**
     * @return void
     */
    public function test1()
    {
        $dsl = [
            'viewport' => [
                'geo_bounds' => [
                    'field' => 'location',
                    'wrap_longitude' => true,
                ],
            ]
        ];
        $item = new Request('viewport');
        $item
            ->setField('location')
            ->setWrapLongitude(true);

        $this->assertArraySame($dsl, [
            $item->getName() => $item->toDsl()
        ]);
    }
}