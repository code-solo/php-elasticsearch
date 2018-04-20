<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Query\FullTest;

use CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Query\AbstractTest;
use CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\FullText\Common;

class CommonTest extends AbstractTest
{
    /**
     * @return void
     */
    public function test1()
    {
        $dsl = [
            'common' => [
                'body' => [
                    'query' => 'this is bonsai cool',
                    'cutoff_frequency' => 0.001,
                    'low_freq_operator' => 'and',
                    'minimum_should_match' => 2,
                ],
            ],
        ];

        $body = new Common\Body();
        $clause = new Common();

        $body
            ->setQuery('this is bonsai cool')
            ->setCutoffFrequency(0.001)
            ->setLowFreqOperator('and')
            ->setMinimumShouldMatch(2);
        $clause->setBody($body);

        $this->assertArraySame($dsl, $clause->toDsl());
    }

    /**
     * @return void
     */
    public function test2()
    {
        $dsl = [
            'common' => [
                'body' => [
                    'minimum_should_match' => [
                        'low_freq' => 2,
                        'high_freq' => 3,
                    ],
                ],
            ],
        ];

        $minimumShouldMatch = new Common\Body\MinimumShouldMatch();
        $body = new Common\Body();
        $clause = new Common();

        $minimumShouldMatch
            ->setLowFreq(2)
            ->setHighFreq(3);
        $body->setMinimumShouldMatch($minimumShouldMatch);
        $clause->setBody($body);

        $this->assertArraySame($dsl, $clause->toDsl());
    }
}