<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Request\Query\Term;

use CodeSolo\ElasticsearchTests\Unit\AbstractTest;
use CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\Term\Prefix;

class PrefixTest extends AbstractTest
{
    /**
     * @return void
     */
    public function test1()
    {
        $dsl = [
            'prefix' => [
                'user' => 'ki',
            ],
        ];
        $clause = new Prefix('user');
        $clause
            ->setValue('ki');
        $this->assertArraySame($dsl, $clause->toDsl());
    }

    /**
     * @return void
     */
    public function test2()
    {
        $dsl = [
            'prefix' => [
                'user' => [
                    'value' => 'ki',
                    'boost' => 2.0,
                ],
            ],
        ];
        $clause = new Prefix('user');
        $clause
            ->setValue('ki')
            ->setBoost(2.0);
        $this->assertArraySame($dsl, $clause->toDsl());
    }
}