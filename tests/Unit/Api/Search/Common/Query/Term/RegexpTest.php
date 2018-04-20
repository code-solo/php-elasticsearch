<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Query\Term;

use CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Query\AbstractTest;
use CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\Term\Regexp;

class RegexpTest extends AbstractTest
{
    /**
     * @return void
     */
    public function test1()
    {
        $dsl = [
            'regexp' => [
                'name.first' => 's.*y',
            ],
        ];
        $clause = new Regexp('name.first');
        $clause
            ->setValue('s.*y');
        $this->assertArraySame($dsl, $clause->toDsl());
    }

    /**
     * @return void
     */
    public function test2()
    {
        $dsl = [
            'regexp' => [
                'name.first' => [
                    'value' => 's.*y',
                    'boost' => 1.2,
                    'flags' => 'INTERSECTION|COMPLEMENT|EMPTY',
                    'max_determinized_states' => 20000,
                ],
            ],
        ];
        $clause = new Regexp('name.first');
        $clause
            ->setValue('s.*y')
            ->setBoost(1.2)
            ->setFlags('INTERSECTION|COMPLEMENT|EMPTY')
            ->setMaxDeterminizedStates(20000);
        $this->assertArraySame($dsl, $clause->toDsl());
    }
}