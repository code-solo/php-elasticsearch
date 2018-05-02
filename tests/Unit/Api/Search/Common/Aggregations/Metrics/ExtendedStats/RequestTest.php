<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Aggregations\Metrics\ExtendedStats;

use CodeSolo\Elasticsearch\Api\Script;
use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Metrics\ExtendedStats\Request;
use CodeSolo\ElasticsearchTests\Unit\AbstractTest;

class RequestTest extends AbstractTest
{
    /**
     * @return void
     */
    public function test1()
    {
        $dsl = [
            'grades_stats' => [
                'extended_stats' => [
                    'field' => 'grade',
                    'sigma' => 1.5,
                    'missing' => 10,
                    'script' => [],
                ],
            ]
        ];
        $item = new Request('grades_stats');
        $item
            ->setField('grade')
            ->setSigma(1.5)
            ->setMissing(10)
            ->setScript(new Script());

        $this->assertArraySame($dsl, [
            $item->getName() => $item->toDsl()
        ]);
    }
}