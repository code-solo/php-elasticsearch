<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Request\Query\Compound;

use CodeSolo\ElasticsearchTests\Unit\AbstractTest;
use CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\Compound\BoolQuery;
use CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\Term\Term;

class BoolQueryTest extends AbstractTest
{
    /**
     * @return void
     */
    public function test1()
    {
        $dsl = [
            'bool' => [
                'must' => [
                    'term' => [
                        'user' => 'kimchy-must',
                    ],
                ],
                'filter' => [
                    'term' => [
                        'user' => 'kimchy-filter',
                    ],
                ],
                'must_not' => [
                    'term' => [
                        'user' => 'kimchy-must_not',
                    ],
                ],
                'should' => [
                    'term' => [
                        'user' => 'kimchy-should',
                    ],
                ],
                'minimum_should_match' => 1,
                'boost' => 1.2,
            ],
        ];
        $clause = new BoolQuery();
        $clause
            ->addToMust(
                (new Term('user'))->setValue('kimchy-must')
            )
            ->addToFilter(
                (new Term('user'))->setValue('kimchy-filter')
            )
            ->addToMustNot(
                (new Term('user'))->setValue('kimchy-must_not')
            )
            ->addToShould(
                (new Term('user'))->setValue('kimchy-should')
            )
            ->setMinimumShouldMatch(1)
            ->setBoost(1.2);
        $this->assertArraySame($dsl, $clause->toDsl());
    }

    /**
     * @return void
     */
    public function test2()
    {
        $dsl = [
            'bool' => [
                'must' => [
                    ['term' => [
                        'user' => 'kimchy-must',
                    ]],
                    ['term' => [
                        'user' => 'kimchy-must',
                    ]]
                ],
                'filter' => [
                    ['term' => [
                        'user' => 'kimchy-filter',
                    ]],
                    ['term' => [
                        'user' => 'kimchy-filter',
                    ]]
                ],
                'must_not' => [
                    ['term' => [
                        'user' => 'kimchy-must_not',
                    ]],
                    ['term' => [
                        'user' => 'kimchy-must_not',
                    ]]
                ],
                'should' => [
                    ['term' => [
                        'user' => 'kimchy-should',
                    ]],
                    ['term' => [
                        'user' => 'kimchy-should',
                    ]]
                ],
            ],
        ];
        $clause = new BoolQuery();
        $clause
            ->addToMust(
                (new Term('user'))->setValue('kimchy-must')
            )
            ->addToMust(
                (new Term('user'))->setValue('kimchy-must')
            )
            ->addToFilter(
                (new Term('user'))->setValue('kimchy-filter')
            )
            ->addToFilter(
                (new Term('user'))->setValue('kimchy-filter')
            )
            ->addToMustNot(
                (new Term('user'))->setValue('kimchy-must_not')
            )
            ->addToMustNot(
                (new Term('user'))->setValue('kimchy-must_not')
            )
            ->addToShould(
                (new Term('user'))->setValue('kimchy-should')
            )
            ->addToShould(
                (new Term('user'))->setValue('kimchy-should')
            );
        $this->assertArraySame($dsl, $clause->toDsl());
    }
}