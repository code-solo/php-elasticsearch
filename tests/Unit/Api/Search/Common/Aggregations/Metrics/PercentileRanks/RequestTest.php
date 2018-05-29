<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Aggregations\Metrics\PercentileRanks;

use CodeSolo\Elasticsearch\Api\Script;
use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Metrics\PercentileRanks\Request;
use CodeSolo\ElasticsearchTests\Unit\AbstractTest;

class RequestTest extends AbstractTest
{
    /**
     * @return void
     */
    public function test1()
    {
        $dsl = [
            'load_time_outlier' => [
                'percentile_ranks' => [
                    'field' => 'load_time',
                    'keyed' => true,
                    'values' => [
                        500,
                        600,
                    ],
                    'hdr' => [
                        'number_of_significant_value_digits' => 3,
                    ],
                    'missing' => 10,
                    'script' => [],
                ],
            ]
        ];
        $item = new Request('load_time_outlier');
        $item
            ->setField('load_time')
            ->setKeyed(true)
            ->setValues([
                500,
                600,
            ])->setHdr(
                (new Request\Hdr())->setNumberOfSignificantValueDigits(3)
            )
            ->setMissing(10)
            ->setScript(new Script());

        $this->assertArraySame($dsl, [
            $item->getName() => $item->toDsl()
        ]);
    }
}