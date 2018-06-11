<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Aggregations\Bucket\Filter;

use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\Filter\Request;
use CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\Term\Term;
use CodeSolo\ElasticsearchTests\Unit\AbstractTest;

class RequestTest extends AbstractTest
{
    public function test1()
    {
        $dsl = [
            't_shirts' => [
                'filter' => [
                    'term' => [
                        'type' => 't-shirt',
                    ],
                ],
            ]
        ];
        $item = new Request('t_shirts');
        $item
            ->setFilter(
                (new Request\Filter())
                ->addClause(
                    (new Term('type'))
                    ->setValue('t-shirt')
                )
            );

        $this->assertArraySame($dsl, [
            $item->getName() => $item->toDsl()
        ]);
    }
}