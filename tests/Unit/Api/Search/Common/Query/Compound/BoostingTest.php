<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Query\Compound;

use CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Query\AbstractTest;
use CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\Compound\Boosting;
use CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\Term\Term;

class BoostingTest extends AbstractTest
{
    /**
     * @return void
     */
    public function test1()
    {
        $dsl = [
            'boosting' => [
                'positive' => [
                    'term' => [
                        'field1' => 'value1',
                    ]
                ],
                'negative' => [
                    'term' => [
                        'field2' => 'value2',
                    ]
                ],
                'negative_boost' => 0.2,
            ],
        ];
        $clause = new Boosting();
        $clause
            ->setNegativeBoost(0.2)
            ->addToPositive(
                (new Term('field1'))->setValue('value1')
            )
            ->addToNegative(
                (new Term('field2'))->setValue('value2')
            );
        $this->assertArraySame($dsl, $clause->toDsl());
    }

    /**
     * @return void
     */
    public function test2()
    {
        $dsl = [
            'boosting' => [
                'positive' => [
                    ['term' => [
                        'field1' => 'value1',
                    ]],
                    ['term' => [
                        'field2' => 'value2',
                    ]]
                ],
                'negative' => [
                    ['term' => [
                        'field3' => 'value3',
                    ]],
                    ['term' => [
                        'field4' => 'value4',
                    ]]
                ],
            ],
        ];
        $clause = new Boosting();
        $clause
            ->addToPositive(
                (new Term('field1'))->setValue('value1')
            )
            ->addToPositive(
                (new Term('field2'))->setValue('value2')
            )
            ->addToNegative(
                (new Term('field3'))->setValue('value3')
            )
            ->addToNegative(
                (new Term('field4'))->setValue('value4')
            );
        $this->assertArraySame($dsl, $clause->toDsl());
    }
}