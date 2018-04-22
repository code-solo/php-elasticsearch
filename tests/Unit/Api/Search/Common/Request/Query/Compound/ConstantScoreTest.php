<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Request\Query\Compound;

use CodeSolo\ElasticsearchTests\Unit\AbstractTest;
use CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\Compound\ConstantScore;
use CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\Term\Term;

class ConstantScoreTest extends AbstractTest
{
    /**
     * @return void
     */
    public function test1()
    {
        $dsl = [
            'constant_score' => [
                'filter' => [
                    'term' => [
                        'user' => 'kimchy',
                    ],
                ],
                'boost' => 1.2,
            ],
        ];
        $clause = new ConstantScore();
        $clause
            ->addToFilter(
                (new Term('user'))->setValue('kimchy')
            )
            ->setBoost(1.2);
        $this->assertArraySame($dsl, $clause->toDsl());
    }

    /**
     * @return void
     */
    public function test2()
    {
        $dsl = [
            'constant_score' => [
                'filter' => [
                    ['term' => [
                        'user' => 'kimchy',
                    ]],
                    ['term' => [
                        'user' => 'kimchy',
                    ]]
                ],
            ],
        ];
        $clause = new ConstantScore();
        $clause
            ->addToFilter(
                (new Term('user'))->setValue('kimchy')
            )
            ->addToFilter(
                (new Term('user'))->setValue('kimchy')
            );
        $this->assertArraySame($dsl, $clause->toDsl());
    }
}