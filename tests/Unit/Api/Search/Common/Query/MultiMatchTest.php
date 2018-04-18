<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Query;

use CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\FullText\MultiMatch;

class MultiMatchTest extends AbstractTest
{
    /**
     * @return void
     */
    public function test1()
    {
        $dsl = [
            'multi_match' => [
                'query' => 'this is a test',
                'fields' => [
                    'subject',
                    'message',
                ],
                'type' => 'best_fields',
                'tie_breaker' => 0.3,
                'operator' => 'and',
                'analyzer' => 'standard',
            ]
        ];

        $clause = new MultiMatch();
        $clause
            ->setQuery('this is a test')
            ->setFields([
                'subject',
                'message',
            ])
            ->setType('best_fields')
            ->setTieBreaker(0.3)
            ->setOperator('and')
            ->setAnalyzer('standard');

        $this->assertArraySame($dsl, $clause->toDsl());
    }
}