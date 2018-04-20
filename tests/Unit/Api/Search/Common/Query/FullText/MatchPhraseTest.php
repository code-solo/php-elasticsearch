<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Query\FullTest;

use CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Query\AbstractTest;
use CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\FullText\MatchPhrase;

class MatchPhraseTest extends AbstractTest
{
    /**
     * @return void
     */
    public function test1()
    {
        $dsl = [
            'match_phrase' => [
                'message' => 'this is a test'
            ]
        ];

        $clause = new MatchPhrase('message');
        $clause->setQuery('this is a test');

        $this->assertArraySame($dsl, $clause->toDsl());
    }

    /**
     * @return void
     */
    public function test2()
    {
        $dsl = [
            'match_phrase' => [
                'message' => [
                    'query' => 'this is a test',
                    'analyzer' => 'my_analyzer',
                ]
            ]
        ];

        $clause = new MatchPhrase('message');
        $clause
            ->setQuery('this is a test')
            ->setAnalyzer('my_analyzer');

        $this->assertArraySame($dsl, $clause->toDsl());
    }
}