<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Query\Compound;

use CodeSolo\Elasticsearch\Api\Script;
use CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\Compound\FunctionScore;
use CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\FullText\Match;
use CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Query\AbstractTest;

class FunctionScoreTest extends AbstractTest
{
    /**
     * @return void
     */
    public function test1()
    {
        $dsl = [
            'function_score' => [
                'boost' => 5,
                'max_boost' => 42,
                'score_mode' => 'max',
                'boost_mode' => 'multiply',
                'min_score' => 42,
                'query' => [
                    'match' => [
                        'message' => 'elasticsearch',
                    ],
                ],
                'functions' => [
                    [
                        'filter' => [
                            'match' => [
                                'test' => 'bar',
                            ]
                        ],
                        'weight' => 23,
                    ],
                    [
                        'filter' => [
                            'match' => [
                                'test' => 'cat',
                            ]
                        ],
                        'weight' => 42,
                    ]
                ],
                // score functions
                'script_score' => [
                    'script' => [
                        'source' => 'Math.log(2 + doc[\'likes\'].value)'
                    ]
                ],
                'weight' => 10,
                'random_score' => [
                    'seed' => 10,
                    'field' => '_seq_no',
                ],
                'field_value_factor' => [
                    'field' => 'likes',
                    'factor' => 1.2,
                    'modifier' => 'sqrt',
                    'missing' => 1,
                ],
                // decay score functions
                'linear' => [
                    'date' => [
                        'origin' => '2013-09-17',
                        'scale' => '10d',
                        'offset' => '5d',
                        'decay' => 0.5,
                    ],
                    'multi_value_mode' => 'min',
                ],
                'exp' => [
                    'date' => [
                        'origin' => '2013-09-18',
                        'scale' => '11d',
                        'offset' => '6d',
                        'decay' => 0.6,
                    ],
                    'multi_value_mode' => 'max',
                ],
                'gauss' => [
                    'date' => [
                        'origin' => '2013-09-19',
                        'scale' => '12d',
                        'offset' => '7d',
                        'decay' => 0.7,
                    ],
                    'multi_value_mode' => 'avg',
                ],
            ],
        ];
        $clause = new FunctionScore();
        $clause
            ->setBoost(5)
            ->setMaxBoost(42)
            ->setScoreMode('max')
            ->setBoostMode('multiply')
            ->setMinScore(42)
            ->addToQuery(
                (new Match('message'))->setQuery('elasticsearch')
            )
            ->addToFunctions(
                (new FunctionScore\Func())
                    ->addToFilter(
                        (new Match('test'))->setQuery('bar')
                    )
                    ->setWeight(23)
            )
            ->addToFunctions(
                (new FunctionScore\Func())
                    ->addToFilter(
                        (new Match('test'))->setQuery('cat')
                    )
                    ->setWeight(42)
            )
            ->setScriptScore(
                (new FunctionScore\ScriptScore())->setScript(
                    (new Script())->setSource('Math.log(2 + doc[\'likes\'].value)')
                )
            )
            ->setWeight(10)
            ->setRandomScore(
                (new FunctionScore\RandomScore())
                    ->setSeed(10)
                    ->setField('_seq_no')
            )
            ->setFieldValueFactor(
                (new FunctionScore\FieldValueFactor())
                    ->setField('likes')
                    ->setFactor(1.2)
                    ->setModifier('sqrt')
                    ->setMissing(1)
            )
            ->setLinear(
                (new FunctionScore\Decay\Linear('date'))
                    ->setOrigin('2013-09-17')
                    ->setScale('10d')
                    ->setOffset('5d')
                    ->setDecay(0.5)
                    ->setMultiValueMode('min')
            )
            ->setExp(
                (new FunctionScore\Decay\Exp('date'))
                    ->setOrigin('2013-09-18')
                    ->setScale('11d')
                    ->setOffset('6d')
                    ->setDecay(0.6)
                    ->setMultiValueMode('max')
            )
            ->setGauss(
                (new FunctionScore\Decay\Gauss('date'))
                    ->setOrigin('2013-09-19')
                    ->setScale('12d')
                    ->setOffset('7d')
                    ->setDecay(0.7)
                    ->setMultiValueMode('avg')
            );
        $this->assertArraySame($dsl, $clause->toDsl());
    }

    /**
     * @return void
     */
    public function test2()
    {
        $dsl = [
            'function_score' => [
                'query' => [
                    ['match' => [
                        'message' => 'elasticsearch',
                    ]],
                    ['match' => [
                        'message' => 'kibana',
                    ]],
                ],
                'functions' => [
                    [
                        'filter' => [
                            ['match' => [
                                'test' => 'bar',
                            ]],
                            ['match' => [
                                'test' => 'cat',
                            ]]
                        ],
                    ],
                ],
            ],
        ];
        $clause = new FunctionScore();
        $clause
            ->addToQuery(
                (new Match('message'))->setQuery('elasticsearch')
            )
            ->addToQuery(
                (new Match('message'))->setQuery('kibana')
            )
            ->addToFunctions(
                (new FunctionScore\Func())
                    ->addToFilter(
                        (new Match('test'))->setQuery('bar')
                    )
                    ->addToFilter(
                        (new Match('test'))->setQuery('cat')
                    )
            );
        $this->assertArraySame($dsl, $clause->toDsl());
    }
}