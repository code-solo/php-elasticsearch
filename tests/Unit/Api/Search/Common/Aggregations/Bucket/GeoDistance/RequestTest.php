<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Aggregations\Bucket\GeoDistance;

use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\GeoDistance\Request;
use CodeSolo\ElasticsearchTests\Unit\AbstractTest;

class RequestTest extends AbstractTest
{
    public function test1()
    {
        $dsl = [
            'rings_around_amsterdam' => [
                'geo_distance' => [
                    'field' => 'location',
                    'origin' => '52.3760, 4.894',
                    'unit' => 'km',
                    'distance_type' => 'plane',
                    'keyed' => true,
                    'ranges' => [
                        [
                            'key' => 'first_ring',
                            'from' => 10,
                            'to' => 100,
                        ],
                        [
                            'key' => 'second_ring',
                            'from' => 10,
                            'to' => 100,
                        ],
                    ],
                ],
            ]
        ];
        $item = new Request('rings_around_amsterdam');
        $item
            ->setField('location')
            ->setOrigin('52.3760, 4.894')
            ->setRanges([
                (new Request\Range())
                    ->setKey('first_ring')
                    ->setFrom(10)
                    ->setTo(100),
                (new Request\Range())
                    ->setKey('second_ring')
                    ->setFrom(10)
                    ->setTo(100),
            ])
            ->setUnit('km')
            ->setDistanceType('plane')
            ->setKeyed(true);

        $this->assertArraySame($dsl, [
            $item->getName() => $item->toDsl()
        ]);
    }
}