<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Query;

use CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\FullText\MatchPhrasePrefix;

class MatchPhrasePrefixTest extends AbstractTest
{
    /**
     * @return void
     */
    public function test1()
    {
        $dsl = [
            'match_phrase_prefix' => [
                'message' => 'this is a test'
            ]
        ];

        $clause = new MatchPhrasePrefix('message');
        $clause->setQuery('this is a test');

        $this->assertArraySame($dsl, $clause->toDsl());
    }

    /**
     * @return void
     */
    public function test2()
    {
        $dsl = [
            'match_phrase_prefix' => [
                'message' => [
                    'query' => 'this is a test',
                    'max_expansions' => 10,
                ]
            ]
        ];

        $clause = new MatchPhrasePrefix('message');
        $clause
            ->setQuery('this is a test')
            ->setMaxExpansions(10);

        $this->assertArraySame($dsl, $clause->toDsl());
    }
}