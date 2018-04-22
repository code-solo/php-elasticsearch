<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Request\Query\Joining;

use CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\FullText\Match;
use CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\Joining\Nested;
use CodeSolo\ElasticsearchTests\Unit\AbstractTest;

class NestedTest extends AbstractTest
{
    /**
     * @return void
     */
    public function test1()
    {
        $dsl = [
            'nested' => [
                'path' => 'obj1',
                'score_mode' => 'avg',
                'query' => [
                    'match' => [
                        'obj1.name' => 'blue',
                    ],
                ],
            ],
        ];
        $clause = new Nested();
        $clause
            ->setPath('obj1')
            ->setScoreMode('avg')
            ->addToQuery(
                (new Match('obj1.name'))->setQuery('blue')
            );
        $this->assertArraySame($dsl, $clause->toDsl());
    }

    /**
     * @return void
     */
    public function test2()
    {
        $dsl = [
            'nested' => [
                'query' => [
                    ['match' => [
                        'obj1.name' => 'blue',
                    ]],
                    ['match' => [
                        'obj2.name' => 'green',
                    ]]
                ],
            ],
        ];
        $clause = new Nested();
        $clause
            ->addToQuery(
                (new Match('obj1.name'))->setQuery('blue')
            )
            ->addToQuery(
                (new Match('obj2.name'))->setQuery('green')
            );
        $this->assertArraySame($dsl, $clause->toDsl());
    }
}