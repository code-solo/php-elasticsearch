<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Query\Term;

use CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Query\AbstractTest;
use CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\Term\Range;

class RangeTest extends AbstractTest
{
    /**
     * @return void
     */
    public function test1()
    {
        $dsl = [
            'range' => [
                'date' => [
                    'gte' => 10,
                    'gt' => 10,
                    'lte' => 10,
                    'lt' => 10,
                    'boost' => 2.0,
                    'format' => 'dd/MM/yy',
                    'time_zone' => '+01:00',
                ],
            ],
        ];

        $clause = new Range('date');
        $clause
            ->setGte(10)
            ->setGt(10)
            ->setLte(10)
            ->setLt(10)
            ->setBoost(2.0)
            ->setFormat('dd/MM/yy')
            ->setTimeZone('+01:00');
        $this->assertArraySame($dsl, $clause->toDsl());
    }
}