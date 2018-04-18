<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Query;

use CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\FullText\Match;

class MatchTest extends AbstractTest
{
    /**
     * @return void
     */
    public function test1()
    {
        $dsl = [
            'match' => [
                'message' => 'this is a test'
            ]
        ];

        $clause = new Match('message');
        $clause->setQuery('this is a test');

        $this->assertArraySame($dsl, $clause->toDsl());
    }

    /**
     * @return void
     */
    public function test2()
    {
        $dsl = [
            'match' => [
                'message' => [
                    'query' => 'this is a test',
                    'operator' => 'and',
                    'zero_terms_query' => 'all',
                    'cutoff_frequency' => 0.001,
                    'auto_generate_synonyms_phrase_query' => false,
                ]
            ]
        ];

        $clause = new Match('message');
        $clause
            ->setQuery('this is a test')
            ->setOperator('and')
            ->setZeroTermsQuery('all')
            ->setCutoffFrequency(0.001)
            ->setAutoGenerateSynonymsPhraseQuery(false);

        $this->assertArraySame($dsl, $clause->toDsl());
    }
}