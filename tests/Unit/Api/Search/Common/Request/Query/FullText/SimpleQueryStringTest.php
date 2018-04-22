<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Request\Query\FullTest;

use CodeSolo\ElasticsearchTests\Unit\AbstractTest;
use CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\FullText\SimpleQueryString;

class SimpleQueryStringTest extends AbstractTest
{
    /**
     * @return void
     */
    public function test1()
    {
        $dsl = [
            'simple_query_string' => [
                'query' => 'this AND that OR thus',
                'fields' => [
                    'title^5',
                    'body',
                ],
                'default_operator' => 'AND',
                'analyzer' => 'my_analyzer',
                'flags' => 'ALL',
                'analyze_wildcard' => false,
                'lenient' => true,
                'minimum_should_match' => '2<-25%',
                'quote_field_suffix' => '.exact',
                'auto_generate_synonyms_phrase_query' => true,
                'fuzzy_prefix_length' => 0,
                'fuzzy_max_expansions' => 50,
                'fuzzy_transpositions' => true,
            ],
        ];

        $clause = new SimpleQueryString();
        $clause
            ->setQuery('this AND that OR thus')
            ->setFields([
                'title^5',
                'body',
            ])
            ->setDefaultOperator('AND')
            ->setAnalyzer('my_analyzer')
            ->setFlags('ALL')
            ->setAnalyzeWildcard(false)
            ->setLenient(true)
            ->setMinimumShouldMatch('2<-25%')
            ->setQuoteFieldSuffix('.exact')
            ->setAutoGenerateSynonymsPhraseQuery(true)
            ->setFuzzyMaxExpansions(50)
            ->setFuzzyPrefixLength(0)
            ->setFuzzyTranspositions(true);

        $this->assertArraySame($dsl, $clause->toDsl());
    }
}