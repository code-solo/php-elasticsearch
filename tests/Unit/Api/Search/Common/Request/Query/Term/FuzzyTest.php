<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Request\Query\Term;

use CodeSolo\ElasticsearchTests\Unit\AbstractTest;
use CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\Term\Fuzzy;

class FuzzyTest extends AbstractTest
{
    /**
     * @return void
     */
    public function test1()
    {
        $dsl = [
            'fuzzy' => [
                'user' => 'ki',
            ],
        ];
        $clause = new Fuzzy('user');
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
            'fuzzy' => [
                'user' => [
                    'value' => 'ki',
                    'boost' => 2.0,
                    'fuzziness' => 2,
                    'prefix_length' => 0,
                    'max_expansions' => 100,
                    'transpositions' => false,
                ],
            ],
        ];
        $clause = new Fuzzy('user');
        $clause
            ->setValue('ki')
            ->setBoost(2.0)
            ->setFuzziness(2)
            ->setPrefixLength(0)
            ->setMaxExpansions(100)
            ->setTranspositions(false);
        $this->assertArraySame($dsl, $clause->toDsl());
    }
}