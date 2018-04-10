<?php

namespace CodeSolo\Elasticsearch\Api\Search\Request\Query\FullText;

use CodeSolo\Elasticsearch\Api\QueryType;
use CodeSolo\Elasticsearch\Api\Search\Request\Query\AbstractClause;

class QueryString extends AbstractClause
{
    /**
     * @var string
     */
    private $query;

    /**
     * @var string
     */
    private $defaultField;

    /**
     * @var string
     */
    private $defaultOperator;

    /**
     * @var string
     */
    private $analyzer;

    /**
     * @var string
     */
    private $quoteAnalyzer;

    /**
     * @var bool|string
     */
    private $allowLeadingWildcard;

    /**
     * @var bool
     */
    private $enablePositionIncrements;

    /**
     * @var int
     */
    private $fuzzyMaxExpansions;

    /**
     * @var string
     */
    private $fuzziness;

    /**
     * @var int
     */
    private $fuzzyPrefixLength;

    /**
     * @var bool
     */
    private $fuzzyTranspositions;

    /**
     * @var int
     */
    private $phraseSlop;

    /**
     * @var float
     */
    private $boost;

    /**
     * @var bool
     */
    private $autoGeneratePhraseQueries;

    /**
     * @var bool
     */
    private $analyzeWildcard;

    /**
     * @var int
     */
    private $maxDeterminizedStates;

    /**
     * @var int|string
     */
    private $minimumShouldMatch;

    /**
     * @var bool
     */
    private $lenient;

    /**
     * @var string
     */
    private $timeZone;

    /**
     * @var string
     */
    private $quoteFieldSuffix;

    /**
     * @var bool
     */
    private $autoGenerateSynonymsPhraseQuery;

    /**
     * @var array
     */
    private $fields;

    /**
     * @var int
     */
    private $tieBreaker;

    /**
     * @inheritdoc
     */
    protected function getType(): string
    {
        return QueryType::QUERY_STRING;
    }

    /**
     * @inheritdoc
     */
    protected function getBody(): array
    {
        $dsl = [];
        if (!is_null($this->query)) {
            $dsl['query'] = $this->query;
        }
        if (!is_null($this->defaultField)) {
            $dsl['default_field'] = $this->defaultField;
        }
        if (!is_null($this->defaultOperator)) {
            $dsl['default_operator'] = $this->defaultOperator;
        }
        if (!is_null($this->analyzer)) {
            $dsl['analyzer'] = $this->analyzer;
        }
        if (!is_null($this->quoteAnalyzer)) {
            $dsl['quote_analyzer'] = $this->quoteAnalyzer;
        }
        if (!is_null($this->allowLeadingWildcard)) {
            $dsl['allow_leading_wildcard'] = $this->allowLeadingWildcard;
        }
        if (!is_null($this->enablePositionIncrements)) {
            $dsl['enable_position_increments'] = $this->enablePositionIncrements;
        }
        if (!is_null($this->fuzzyMaxExpansions)) {
            $dsl['fuzzy_max_expansions'] = $this->fuzzyMaxExpansions;
        }
        if (!is_null($this->fuzziness)) {
            $dsl['fuzziness'] = $this->fuzziness;
        }
        if (!is_null($this->fuzzyPrefixLength)) {
            $dsl['fuzzy_prefix_length'] = $this->fuzzyPrefixLength;
        }
        if (!is_null($this->fuzzyTranspositions)) {
            $dsl['fuzzy_transpositions'] = $this->fuzzyTranspositions;
        }
        if (!is_null($this->phraseSlop)) {
            $dsl['phrase_slop'] = $this->phraseSlop;
        }
        if (!is_null($this->boost)) {
            $dsl['boost'] = $this->boost;
        }
        if (!is_null($this->autoGeneratePhraseQueries)) {
            $dsl['auto_generate_phrase_queries'] = $this->autoGeneratePhraseQueries;
        }
        if (!is_null($this->analyzeWildcard)) {
            $dsl['analyze_wildcard'] = $this->analyzeWildcard;
        }
        if (!is_null($this->maxDeterminizedStates)) {
            $dsl['max_determinized_states'] = $this->maxDeterminizedStates;
        }
        if (!is_null($this->minimumShouldMatch)) {
            $dsl['minimum_should_match'] = $this->minimumShouldMatch;
        }
        if (!is_null($this->lenient)) {
            $dsl['lenient'] = $this->lenient;
        }
        if (!is_null($this->timeZone)) {
            $dsl['time_zone'] = $this->timeZone;
        }
        if (!is_null($this->quoteFieldSuffix)) {
            $dsl['quote_field_suffix'] = $this->quoteFieldSuffix;
        }
        if (!is_null($this->autoGenerateSynonymsPhraseQuery)) {
            $dsl['auto_generate_synonyms_phrase_query'] = $this->autoGenerateSynonymsPhraseQuery;
        }
        if (!is_null($this->fields)) {
            $dsl['fields'] = $this->fields;
        }
        if (!is_null($this->tieBreaker)) {
            $dsl['tie_breaker'] = $this->tieBreaker;
        }
        return $dsl;
    }

    /**
     * @param string $query
     * @return QueryString|static
     */
    public function setQuery(string $query): QueryString
    {
        $this->query = $query;
        return $this;
    }

    /**
     * @param string $defaultField
     * @return QueryString|static
     */
    public function setDefaultField(string $defaultField): QueryString
    {
        $this->defaultField = $defaultField;
        return $this;
    }

    /**
     * @param string $defaultOperator
     * @return QueryString|static
     */
    public function setDefaultOperator(string $defaultOperator): QueryString
    {
        $this->defaultOperator = $defaultOperator;
        return $this;
    }

    /**
     * @param string $analyzer
     * @return QueryString|static
     */
    public function setAnalyzer(string $analyzer): QueryString
    {
        $this->analyzer = $analyzer;
        return $this;
    }

    /**
     * @param string $quoteAnalyzer
     * @return QueryString|static
     */
    public function setQuoteAnalyzer(string $quoteAnalyzer): QueryString
    {
        $this->quoteAnalyzer = $quoteAnalyzer;
        return $this;
    }

    /**
     * @param bool|string $allowLeadingWildcard
     * @return QueryString|static
     */
    public function setAllowLeadingWildcard($allowLeadingWildcard): QueryString
    {
        $this->allowLeadingWildcard = $allowLeadingWildcard;
        return $this;
    }

    /**
     * @param bool $enablePositionIncrements
     * @return QueryString|static
     */
    public function setEnablePositionIncrements(bool $enablePositionIncrements): QueryString
    {
        $this->enablePositionIncrements = $enablePositionIncrements;
        return $this;
    }

    /**
     * @param int $fuzzyMaxExpansions
     * @return QueryString|static
     */
    public function setFuzzyMaxExpansions(int $fuzzyMaxExpansions): QueryString
    {
        $this->fuzzyMaxExpansions = $fuzzyMaxExpansions;
        return $this;
    }

    /**
     * @param string $fuzziness
     * @return QueryString|static
     */
    public function setFuzziness(string $fuzziness): QueryString
    {
        $this->fuzziness = $fuzziness;
        return $this;
    }

    /**
     * @param int $fuzzyPrefixLength
     * @return QueryString|static
     */
    public function setFuzzyPrefixLength(int $fuzzyPrefixLength): QueryString
    {
        $this->fuzzyPrefixLength = $fuzzyPrefixLength;
        return $this;
    }

    /**
     * @param bool $fuzzyTranspositions
     * @return QueryString|static
     */
    public function setFuzzyTranspositions(bool $fuzzyTranspositions): QueryString
    {
        $this->fuzzyTranspositions = $fuzzyTranspositions;
        return $this;
    }

    /**
     * @param int $phraseSlop
     * @return QueryString|static
     */
    public function setPhraseSlop(int $phraseSlop): QueryString
    {
        $this->phraseSlop = $phraseSlop;
        return $this;
    }

    /**
     * @param float $boost
     * @return QueryString|static
     */
    public function setBoost(float $boost): QueryString
    {
        $this->boost = $boost;
        return $this;
    }

    /**
     * @param bool $autoGeneratePhraseQueries
     * @return QueryString|static
     */
    public function setAutoGeneratePhraseQueries(bool $autoGeneratePhraseQueries): QueryString
    {
        $this->autoGeneratePhraseQueries = $autoGeneratePhraseQueries;
        return $this;
    }

    /**
     * @param bool $analyzeWildcard
     * @return QueryString|static
     */
    public function setAnalyzeWildcard(bool $analyzeWildcard): QueryString
    {
        $this->analyzeWildcard = $analyzeWildcard;
        return $this;
    }

    /**
     * @param int $maxDeterminizedStates
     * @return QueryString|static
     */
    public function setMaxDeterminizedStates(int $maxDeterminizedStates): QueryString
    {
        $this->maxDeterminizedStates = $maxDeterminizedStates;
        return $this;
    }

    /**
     * @param int|string $minimumShouldMatch
     * @return QueryString|static
     */
    public function setMinimumShouldMatch($minimumShouldMatch): QueryString
    {
        $this->minimumShouldMatch = $minimumShouldMatch;
        return $this;
    }

    /**
     * @param bool $lenient
     * @return QueryString|static
     */
    public function setLenient(bool $lenient): QueryString
    {
        $this->lenient = $lenient;
        return $this;
    }

    /**
     * @param string $timeZone
     * @return QueryString|static
     */
    public function setTimeZone(string $timeZone): QueryString
    {
        $this->timeZone = $timeZone;
        return $this;
    }

    /**
     * @param string $quoteFieldSuffix
     * @return QueryString|static
     */
    public function setQuoteFieldSuffix(string $quoteFieldSuffix): QueryString
    {
        $this->quoteFieldSuffix = $quoteFieldSuffix;
        return $this;
    }

    /**
     * @param bool $autoGenerateSynonymsPhraseQuery
     * @return QueryString|static
     */
    public function setAutoGenerateSynonymsPhraseQuery(bool $autoGenerateSynonymsPhraseQuery): QueryString
    {
        $this->autoGenerateSynonymsPhraseQuery = $autoGenerateSynonymsPhraseQuery;
        return $this;
    }

    /**
     * @param array $fields
     * @return QueryString|static
     */
    public function setFields(array $fields): QueryString
    {
        $this->fields = $fields;
        return $this;
    }

    /**
     * @param int $tieBreaker
     * @return QueryString|static
     */
    public function setTieBreaker(int $tieBreaker): QueryString
    {
        $this->tieBreaker = $tieBreaker;
        return $this;
    }
}