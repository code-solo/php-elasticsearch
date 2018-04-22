<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Request\Query\Joining;

use CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\Joining\HasChild;
use CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\Term\Term;
use CodeSolo\ElasticsearchTests\Unit\AbstractTest;

class HasChildTest extends AbstractTest
{
    /**
     * @return void
     */
    public function test1()
    {
        $dsl = [
            'has_child' => [
                'type' => 'blog_tag',
                'score_mode' => 'min',
                'min_children' => 2,
                'max_children' => 10,
                'query' => [
                    'term' => [
                        'tag' => 'something',
                    ],
                ],
            ],
        ];
        $clause = new HasChild();
        $clause
            ->setType('blog_tag')
            ->setScoreMode('min')
            ->setMinChildren(2)
            ->setMaxChildren(10)
            ->addToQuery(
                (new Term('tag'))->setValue('something')
            );
        $this->assertArraySame($dsl, $clause->toDsl());
    }

    /**
     * @return void
     */
    public function test2()
    {
        $dsl = [
            'has_child' => [
                'query' => [
                    ['term' => [
                        'tag' => 'something1',
                    ]],
                    ['term' => [
                        'tag' => 'something2',
                    ]]
                ],
            ],
        ];
        $clause = new HasChild();
        $clause
            ->addToQuery(
                (new Term('tag'))->setValue('something1')
            )
            ->addToQuery(
                (new Term('tag'))->setValue('something2')
            );
        $this->assertArraySame($dsl, $clause->toDsl());
    }
}