<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Query;

use CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\Term\Term;

class TermTest extends AbstractTest
{
    /**
     * @return void
     */
    public function test1()
    {
        $dsl = [
            'term' => [
                'user' => 'Kimchy',
            ],
        ];
        $clause = new Term('user');
        $clause
            ->setValue('Kimchy');
        $this->assertArraySame($dsl, $clause->toDsl());
    }

    /**
     * @return void
     */
    public function test2()
    {
        $dsl = [
            'term' => [
                'user' => [
                    'value' => 'Kimchy',
                    'boost' => 2.0,
                ],
            ],
        ];
        $clause = new Term('user');
        $clause
            ->setValue('Kimchy')
            ->setBoost(2.0);
        $this->assertArraySame($dsl, $clause->toDsl());
    }
}