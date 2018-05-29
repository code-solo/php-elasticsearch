<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Aggregations\Metrics\Percentiles;

use CodeSolo\Elasticsearch\Api\Script;
use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Metrics\Percentiles\Request;
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
                'percentiles' => [
                    'field' => 'load_time',
                    'keyed' => true,
                    'tdigest' => [
                        'compression' => 200,
                    ],
                    'percents' => [
                        95,
                        99,
                        99.9,
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
            ->setTDigest(
                (new Request\TDigest())->setCompression(200)
            )
            ->setPercents([
                95,
                99,
                99.9,
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