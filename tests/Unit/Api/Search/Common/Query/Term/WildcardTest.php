<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Query\Term;

use CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Query\AbstractTest;
use CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\Term\Wildcard;

class WildcardTest extends AbstractTest
{
    /**
     * @return void
     */
    public function test1()
    {
        $dsl = [
            'wildcard' => [
                'user' => 'ki*y',
            ],
        ];
        $clause = new Wildcard('user');
        $clause
            ->setValue('ki*y');
        $this->assertArraySame($dsl, $clause->toDsl());
    }

    /**
     * @return void
     */
    public function test2()
    {
        $dsl = [
            'wildcard' => [
                'user' => [
                    'value' => 'ki*y',
                    'boost' => 2.0,
                ],
            ],
        ];
        $clause = new Wildcard('user');
        $clause
            ->setValue('ki*y')
            ->setBoost(2.0);
        $this->assertArraySame($dsl, $clause->toDsl());
    }
}