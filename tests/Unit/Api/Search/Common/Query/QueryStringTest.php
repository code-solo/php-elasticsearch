<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Query;

use CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\FullText\QueryString;

class QueryStringTest extends AbstractTest
{
    /**
     * @return void
     */
    public function test1()
    {
        $dsl = [
            'query_string' => [
                'default_field' => 'content',
                'query' => 'this AND that OR thus',
                'default_operator' => 'AND',
                'analyzer' => 'my_analyzer',
                'quote_analyzer' => 'my_quote_analyzer',
                'allow_leading_wildcard' => '*',
                'enable_position_increments' => true,
                'fuzzy_max_expansions' => 50,
                'fuzziness' => 'AUTO',
                'fuzzy_prefix_length' => 0,
                'fuzzy_transpositions' => true,
                'phrase_slop' => 0,
                'boost' => 1.0,
                'auto_generate_phrase_queries' => false,
                'analyze_wildcard' => true,
                'max_determinized_states' => 10000,
                'minimum_should_match' => '2<-25%',
                'lenient' => true,
                'time_zone' => 'UTC-07:00',
                'quote_field_suffix' => '.exact',
                'auto_generate_synonyms_phrase_query' => true,
            ],
        ];

        $clause = new QueryString();
        $clause
            ->setDefaultField('content')
            ->setQuery('this AND that OR thus')
            ->setDefaultOperator('AND')
            ->setAnalyzer('my_analyzer')
            ->setQuoteAnalyzer('my_quote_analyzer')
            ->setAllowLeadingWildcard('*')
            ->setEnablePositionIncrements(true)
            ->setFuzzyMaxExpansions(50)
            ->setFuzziness('AUTO')
            ->setFuzzyPrefixLength(0)
            ->setFuzzyTranspositions(true)
            ->setPhraseSlop(0)
            ->setBoost(1.0)
            ->setAutoGeneratePhraseQueries(false)
            ->setAnalyzeWildcard(true)
            ->setMaxDeterminizedStates(10000)
            ->setMinimumShouldMatch('2<-25%')
            ->setLenient(true)
            ->setTimeZone('UTC-07:00')
            ->setQuoteFieldSuffix('.exact')
            ->setAutoGenerateSynonymsPhraseQuery(true);

        $this->assertArraySame($dsl, $clause->toDsl());
    }
}