<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Aggregations\Bucket\Filters;

use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\Filters\Request;
use CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\FullText\Match;
use CodeSolo\ElasticsearchTests\Unit\AbstractTest;

class RequestTest extends AbstractTest
{
    /**
     * Test.
     */
    public function test1()
    {
        $dsl = [
            'messages' => [
                'filters' => [
                    'filters' => [
                        'errors' => [
                            'match' => [
                                'body' => 'error',
                            ]
                        ],
                        'warnings' => [
                            'match' => [
                                'body' => 'warning',
                            ]
                        ],
                    ],
                    'other_bucket_key' => 'other_messages',
                ],
            ]
        ];
        $item = new Request('messages');
        $item
            ->setOtherBucketKey('other_messages')
            ->setFilters([
                (new Request\Filter())
                    ->setName('errors')
                    ->addClause(
                        (new Match('body'))
                            ->setQuery('error')
                    ),
                (new Request\Filter())
                    ->setName('warnings')
                    ->addClause(
                        (new Match('body'))
                            ->setQuery('warning')
                    ),
            ]);

        $this->assertArraySame($dsl, [
            $item->getName() => $item->toDsl()
        ]);
    }

    /**
     * Test.
     */
    public function test2()
    {
        $dsl = [
            'messages' => [
                'filters' => [
                    'filters' => [
                        [
                            'match' => [
                                'body' => 'error',
                            ]
                        ],
                        [
                            'match' => [
                                'body' => 'warning',
                            ]
                        ],
                    ],
                ],
            ]
        ];
        $item = new Request('messages');
        $item
            ->setFilters([
                (new Request\Filter())
                    ->addClause(
                        (new Match('body'))
                            ->setQuery('error')
                    ),
                (new Request\Filter())
                    ->addClause(
                        (new Match('body'))
                            ->setQuery('warning')
                    ),
            ]);

        $this->assertArraySame($dsl, [
            $item->getName() => $item->toDsl()
        ]);
    }
}