<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Request\Query\Compound;

use CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\Compound\DisMax;
use CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\Term\Term;
use CodeSolo\ElasticsearchTests\Unit\AbstractTest;

class DisMaxTest extends AbstractTest
{
    /**
     * @return void
     */
    public function test1()
    {
        $dsl = [
            'dis_max' => [
                'tie_breaker' => 0.7,
                'boost' => 1.2,
                'queries' => [
                    'term' => [
                        'age' => 34,
                    ],
                ],
            ],
        ];
        $clause = new DisMax();
        $clause
            ->setTieBreaker(0.7)
            ->setBoost(1.2)
            ->addToQueries(
                (new Term('age'))->setValue(34)
            );
        $this->assertArraySame($dsl, $clause->toDsl());
    }

    /**
     * @return void
     */
    public function test2()
    {
        $dsl = [
            'dis_max' => [
                'queries' => [
                    ['term' => [
                        'age' => 34,
                    ]],
                    ['term' => [
                        'age' => 35,
                    ]]
                ],
            ],
        ];
        $clause = new DisMax();
        $clause
            ->addToQueries(
                (new Term('age'))->setValue(34)
            )
            ->addToQueries(
                (new Term('age'))->setValue(35)
            );
        $this->assertArraySame($dsl, $clause->toDsl());
    }
}