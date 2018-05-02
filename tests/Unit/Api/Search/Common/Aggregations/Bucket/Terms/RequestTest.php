<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Aggregations\Bucket\Tests;

use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\Terms\Request;
use CodeSolo\ElasticsearchTests\Unit\AbstractTest;
use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Metrics\Avg\Request as AvgRequest;

class RequestTest extends AbstractTest
{
    public function test1()
    {
        $dsl = [
            'genres' => [
                'terms' => [
                    'field' => 'genre',
                    'size' => 5,
                    'show_term_doc_count_error' => true,
                ],
                'aggregations' => [
                    'avg_grade' => [
                        'avg' => [],
                    ]
                ],
            ]
        ];
        $item = new Request('genres');
        $item
            ->setField('genre')
            ->setSize(5)
            ->setShowTermDocCountError(true)
            ->addAggregationsItem(new AvgRequest('avg_grade'));

        $this->assertArraySame($dsl, [
            $item->getName() => $item->toDsl()
        ]);
    }
}