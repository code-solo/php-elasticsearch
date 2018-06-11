<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Aggregations\Bucket\DateRange;

use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\DateRange\Request;
use CodeSolo\ElasticsearchTests\Unit\AbstractTest;

class RequestTest extends AbstractTest
{
    public function test1()
    {
        $dsl = [
            'range' => [
                'date_range' => [
                    'field' => 'date',
                    'format' => 'MM-yyy',
                    'ranges' => [
                        [
                            'to' => 'now-10M/M',
                            'from' => 'now-10M/M',
                            'key' => 'Older',
                        ], [
                            'to' => 'now-10M/M',
                            'from' => 'now-10M/M',
                            'key' => 'Newer',
                        ]
                    ],
                    'missing' => '1976/11/30',
                    'time_zone' => 'CET',
                    'keyed' => true,
                ],
            ]
        ];
        $item = new Request('range');
        $item
            ->setField('date')
            ->setFormat('MM-yyy')
            ->setRanges([
                (new Request\Range())
                    ->setKey('Older')
                    ->setFrom('now-10M/M')
                    ->setTo('now-10M/M'),
                (new Request\Range())
                    ->setKey('Newer')
                    ->setFrom('now-10M/M')
                    ->setTo('now-10M/M'),
            ])
            ->setMissing('1976/11/30')
            ->setTimeZone('CET')
            ->setKeyed(true);

        $this->assertArraySame($dsl, [
            $item->getName() => $item->toDsl()
        ]);
    }
}