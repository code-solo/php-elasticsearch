<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Request\Query\Joining;

use CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\Joining\HasParent;
use CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\Term\Term;
use CodeSolo\ElasticsearchTests\Unit\AbstractTest;

class HasParentTest extends AbstractTest
{
    /**
     * @return void
     */
    public function test1()
    {
        $dsl = [
            'has_parent' => [
                'parent_type' => 'blog',
                'score' => true,
                'query' => [
                    'term' => [
                        'tag' => 'something',
                    ],
                ],
            ],
        ];
        $clause = new HasParent();
        $clause
            ->setParentType('blog')
            ->setScore(true)
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
            'has_parent' => [
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
        $clause = new HasParent();
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