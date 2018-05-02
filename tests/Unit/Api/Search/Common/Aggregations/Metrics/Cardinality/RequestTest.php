<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Aggregations\Metrics\Cardinality;

use CodeSolo\Elasticsearch\Api\Script;
use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Metrics\Cardinality\Request;
use CodeSolo\ElasticsearchTests\Unit\AbstractTest;

class RequestType extends AbstractTest
{
    /**
     * @return void
     */
    public function test1()
    {
        $dsl = [
            'type_count' => [
                'cardinality' => [
                    'field' => 'type',
                    'missing' => 'N/A',
                    'script' => [],
                    'precision_threshold' => 100,
                ],
            ]
        ];
        $item = new Request('type_count');
        $item
            ->setField('type')
            ->setMissing('N/A')
            ->setScript(new Script())
            ->setPrecisionThreshold(100);

        $this->assertArraySame($dsl, [
            $item->getName() => $item->toDsl()
        ]);
    }
}