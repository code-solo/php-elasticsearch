<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Aggregations\Bucket\DateHistogram;

use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\DateHistogram\Request;
use CodeSolo\ElasticsearchTests\Unit\AbstractTest;

class RequestTest extends AbstractTest
{
    /**
     * @return void
     */
    public function test1()
    {
        $dsl = [
            'sales_over_time' => [
                'date_histogram' => [
                    'field' => 'date',
                    'interval' => 'month',
                    'format' => 'yyyy-MM-dd',
                    'time_zone' => '-01:00',
                    'offset' => '+6h',
                    'keyed' => true,
                    'missing' => '2000/01/01',
                    'min_doc_count' => 10,
                    'extended_bounds' => [
                        'min' => 0,
                        'max' => 500,
                    ],
                ],
            ]
        ];
        $item = new Request('sales_over_time');
        $item
            ->setField('date')
            ->setInterval('month')
            ->setFormat('yyyy-MM-dd')
            ->setTimeZone('-01:00')
            ->setOffset('+6h')
            ->setKeyed(true)
            ->setMissing('2000/01/01')
            ->setMinDocCount(10)
            ->setExtendedBounds(
                (new Request\ExtendedBounds())
                ->setMin(0)
                ->setMax(500)
            );

        $this->assertArraySame($dsl, [
            $item->getName() => $item->toDsl()
        ]);
    }
}